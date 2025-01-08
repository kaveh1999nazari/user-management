<?php return array (
  'province' => 
  array (
    1 => 'App\\Domain\\Entity\\Province',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'provinces',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'name' => 'name',
    ),
    10 => 
    array (
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'name' => 'string',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'userJob' => 
  array (
    1 => 'App\\Domain\\Entity\\UserJob',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\UserJobRepository',
    5 => 'default',
    6 => 'user_jobs',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'title' => 'title',
      'phone' => 'phone',
      'postalCode' => 'postal_code',
      'address' => 'address',
      'monthlySalary' => 'monthly_salary',
      'workExperienceDuration' => 'work_experience_duration',
      'workType' => 'work_type',
      'contractType' => 'contract_type',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'user_id' => 'user_id',
      'province_id' => 'province_id',
      'city_id' => 'city_id',
    ),
    10 => 
    array (
      'user' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'user_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'province' => 
      array (
        0 => 12,
        1 => 'province',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => true,
          33 => 'province_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'city' => 
      array (
        0 => 12,
        1 => 'city',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => true,
          33 => 'city_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'title' => 'string',
      'phone' => 'string',
      'postalCode' => 'string',
      'address' => 'string',
      'monthlySalary' => 'float',
      'workExperienceDuration' => 'int',
      'workType' => 'string',
      'contractType' => 'string',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'user_id' => 'int',
      'province_id' => 'int',
      'city_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'media' => 
  array (
    1 => 'App\\Domain\\Entity\\Media',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\MediaRepository',
    5 => 'default',
    6 => 'medias',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'entityType' => 'entity_type',
      'entityId' => 'entity_id',
      'name' => 'name',
      'pass' => 'pass',
      'createdAt' => 'created_at',
    ),
    10 => 
    array (
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'entityType' => 'string',
      'entityId' => 'int',
      'name' => 'string',
      'pass' => 'string',
      'createdAt' => 'datetime',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'city' => 
  array (
    1 => 'App\\Domain\\Entity\\City',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'cities',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'name' => 'name',
      'province_id' => 'province_id',
    ),
    10 => 
    array (
      'province' => 
      array (
        0 => 12,
        1 => 'province',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'province_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'name' => 'string',
      'province_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'userEducation' => 
  array (
    1 => 'App\\Domain\\Entity\\UserEducation',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\UserEducationRepository',
    5 => 'default',
    6 => 'user_educations',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'university' => 'university',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'user_id' => 'user_id',
      'degree_id' => 'degree_id',
    ),
    10 => 
    array (
      'user' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'user_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'degree' => 
      array (
        0 => 12,
        1 => 'degree',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => true,
          33 => 'degree_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'university' => 'string',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'user_id' => 'int',
      'degree_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'user' => 
  array (
    1 => 'App\\Domain\\Entity\\User',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\UserRepository',
    5 => 'default',
    6 => 'users',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'firstName' => 'first_name',
      'lastName' => 'last_name',
      'email' => 'email',
      'mobile' => 'mobile',
      'password' => 'password',
      'fatherName' => 'father_name',
      'nationalCode' => 'national_code',
      'birthDate' => 'birth_date',
      'roles' => 'roles',
      'created_at' => 'created_at',
      'updated_at' => 'updated_at',
      'otpCode' => 'otp_code',
      'otpExpiredAt' => 'otp_expired_at',
    ),
    10 => 
    array (
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'firstName' => 'string',
      'lastName' => 'string',
      'email' => 'string',
      'mobile' => 'string',
      'password' => 'string',
      'fatherName' => 'string',
      'nationalCode' => 'string',
      'birthDate' => 'datetime',
      'roles' => 'string',
      'created_at' => 'datetime',
      'updated_at' => 'datetime',
      'otpCode' => 'string',
      'otpExpiredAt' => 'datetime',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'userResident' => 
  array (
    1 => 'App\\Domain\\Entity\\UserResident',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\UserResidentRepository',
    5 => 'default',
    6 => 'user_residents',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'address' => 'address',
      'postalCode' => 'postal_code',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'user_id' => 'user_id',
      'province_id' => 'province_id',
      'city_id' => 'city_id',
    ),
    10 => 
    array (
      'user' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'user_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'province' => 
      array (
        0 => 12,
        1 => 'province',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => true,
          33 => 'province_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'city' => 
      array (
        0 => 12,
        1 => 'city',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => true,
          33 => 'city_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'address' => 'string',
      'postalCode' => 'string',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'user_id' => 'int',
      'province_id' => 'int',
      'city_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'degree' => 
  array (
    1 => 'App\\Domain\\Entity\\Degree',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'degrees',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'name' => 'name',
    ),
    10 => 
    array (
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'name' => 'string',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
);