<?php

namespace App\Endpoint\GRPC;

use App\Domain\Attribute\ValidateBy;
use App\Domain\Entity\City;
use App\Domain\Entity\Degree;
use App\Domain\Entity\Media;
use App\Domain\Entity\Province;
use App\Domain\Entity\User;
use App\Domain\Entity\UserEducation;
use App\Domain\Entity\UserResident;
use App\Domain\Request\UserCreateRequest;
use App\Domain\Request\UserCreateResidentRequest;
use App\Domain\Request\UserUpdateRequest;
use Cycle\ORM\ORMInterface;
use Google\Rpc\Code;
use GRPC\user\RegisterUserEducationResponse;
use GRPC\user\RegisterUserResidentResponse;
use GRPC\UserManagement\CreateUserEducationRequest;
use GRPC\UserManagement\CreateUserEducationResponse;
use GRPC\UserManagement\CreateUserJobRequest;
use GRPC\UserManagement\CreateUserJobResponse;
use GRPC\UserManagement\CreateUserRequest;
use GRPC\UserManagement\CreateUserResidentRequest;
use GRPC\UserManagement\CreateUserResidentResponse;
use GRPC\UserManagement\CreateUserResponse;
use GRPC\UserManagement\UpdateUserResponse;
use GRPC\UserManagement\UserManagementGrpcInterface;
use Spiral\RoadRunner\GRPC;
use Spiral\RoadRunner\GRPC\Exception\GRPCException;

class UserManagementService implements UserManagementGrpcInterface
{
    public function __construct(private readonly ORMInterface $ORM){}

    #[ValidateBy(UserCreateRequest::class)]
    public function Create(GRPC\ContextInterface $ctx, CreateUserRequest $in): CreateUserResponse
    {
        $password = password_hash($in->getPassword(), PASSWORD_BCRYPT);

        if ($in->getBirthDate()) {
            $birthDate = \DateTimeImmutable::createFromFormat('Y-m-d', $in->getBirthDate());
        }

        $user = $this->ORM->getRepository(User::class)
            ->create($in->getFirstName(), $in->getLastName(), $in->getMobile(), $in->getEmail(), $password,
                $in->getFatherName(), $in->getNationalCode(), $birthDate);

        if ($in->getPicture()) {
            $imageName = substr($in->getPicture(), 26);
            $this->uploadMedia('user',
                $user->getId(),
                $imageName,
                $in->getPicture());
        }

        $response = new CreateUserResponse();
        $response->setId($user->getId());
        $response->setMessage("successfully account:{$user->getMobile()} created");
        return $response;
    }

    #[ValidateBy(UserCreateResidentRequest::class)]
    public function CreateResident(GRPC\ContextInterface $ctx, CreateUserResidentRequest $in): CreateUserResidentResponse
    {
        $user = $this->ORM->getRepository(User::class)
            ->findByPK($in->getUser());
        $province = $in->getProvince() ? $this->ORM->getRepository(Province::class)->findByPK($in->getProvince()) : null;
        $city = ($in->getCity() && $in->getProvince())
            ? $this->ORM->getRepository(City::class)
                ->select()
                ->where(['id' => $in->getCity()])
                ->andWhere(['province_id' => $in->getProvince()])
                ->fetchOne()
            : null;

        if(null === $city){
            throw new GRPCException(message: 'this is city is not exist for this province',
                                    code: Code::NOT_FOUND);
        }

        $this->ORM->getRepository(UserResident::class)
            ->create($user,
                $in->getAddress(),
                $in->getPostalCode(),
                $province,
                $city);

        if ($in->getPostalCodeFile()) {
            $name = substr($in->getPostalCodeFile(), 26);
            $this->uploadMedia('userResident',
                $user->getId(),
                $name,
                $in->getPostalCodeFile());
        }

        $response = new CreateUserResidentResponse();
        $response->setId($user->getId());
        $response->setMessage("User Resident account: {$user->getMobile()} successfully create");

        return $response;

    }

    public function CreateEducation(GRPC\ContextInterface $ctx, CreateUserEducationRequest $in): CreateUserEducationResponse
    {
        $user = $this->ORM->getRepository(User::class)
            ->findByPK($in->getUser());
        $degree = $this->ORM->getRepository(Degree::class)
            ->findByPK($in->getDegree());

        $this->ORM->getRepository(UserEducation::class)
            ->create($user, $in->getUniversity(), $degree);

        if ($in->getEducationFile()) {
            $name = substr($in->getEducationFile(), 26);
            $this->uploadMedia('userEducation',
                $user->getId(),
                $name,
                $in->getEducationFile());
        }

        $response = new CreateUserEducationResponse();
        $response->setId($user->getId());
        $response->setMessage("User Education account: {$user->getMobile()} successfully create");

        return $response;
    }

    public function CreateJob(GRPC\ContextInterface $ctx, CreateUserJobRequest $in): CreateUserJobResponse
    {

    }
    #[ValidateBy(UserUpdateRequest::class)]
    public function Update(GRPC\ContextInterface $ctx, \GRPC\UserManagement\UpdateUserRequest $in): UpdateUserResponse
    {
        $user = $this->ORM->getRepository(User::class)
            ->findByPK($in->getUser());
        if (!$user) {
            throw new GRPCException(
                message: "User Not Found",
                code: Code::NOT_FOUND
            );
        }

        $password = password_hash($in->getPassword(), PASSWORD_BCRYPT);

        if ($in->getBirthDate()) {
            $birthDate = \DateTimeImmutable::createFromFormat('Y-m-d', $in->getBirthDate());
        }

        if ($in->getCode() === $user->getOtpCode() && $user->getOtpExpiredAt() > new \DateTimeImmutable()) {
            $this->ORM->getRepository(User::class)
                ->update($user->getId(), $in->getFirstName() ?: null, $in->getLastName() ?: null,
                    $in->getMobile() ?: null, $in->getEmail() ?: null, $password ?: null,
                    $in->getFatherName() ?: null, $in->getNationalCode() ?: null, $birthDate ?: null);

            if ($in->getPicture()) {
                $name = substr($in->getPicture(), 26);
                $this->uploadMedia('user',
                    $user->getId(),
                    $name,
                    $in->getPicture());
            }

            $response = new UpdateUserResponse();
            $response->setId($user->getId());
            $response->setMessage("update account : {$user->getMobile()} successfully");

            return $response;

        } else {
            throw new GRPCException(
                message: "your code is invalid or expired!",
                code: Code::UNAUTHENTICATED
            );
        }
    }

    // ------ Methods -------

    private function uploadMedia(string $entityName, int $entityId,
                                 string $imageName, string $imagePath): void
    {
        $this->ORM->getRepository(Media::class)
            ->upload($entityName, $entityId, $imageName, $imagePath);
    }
}
