<?php

namespace App\Endpoint\GRPC;

use App\Domain\Attribute\ValidateBy;
use App\Domain\Entity\Media;
use App\Domain\Entity\User;
use App\Domain\Request\UserCreateRequest;
use App\Domain\Request\UserUpdateRequest;
use Cycle\ORM\ORMInterface;
use Google\Rpc\Code;
use GRPC\UserManagement\CreateUserRequest;
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
                ->update($user->getId(), $in->getFirstName(), $in->getLastName(),
                    $in->getMobile(), $in->getEmail(), $password,
                    $in->getFatherName(), $in->getNationalCode(), $birthDate);

            if ($in->getPicture()) {
                $name = substr($in->getPicture(), 26);
                $this->uploadMedia('user',
                    $user->getId(),
                    $name,
                    $in->getPicture());
            }
        }

        $response = new UpdateUserResponse();
        $response->setId($user->getId());
        $response->setMessage("update account : {$user->getMobile()} successfully");

        return $response;

    }

    // ------ Methods -------

    private function uploadMedia(string $entityName, int $entityId,
                                 string $imageName, string $imagePath): void
    {
        $this->ORM->getRepository(Media::class)
            ->upload($entityName, $entityId, $imageName, $imagePath);
    }
}
