<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: user_management.proto

namespace GRPC\user_management\GPBMetadata;

class UserManagement
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
user_management.protouser_management"�
CreateUserRequest

first_name (	
	last_name (	
mobile (	
email (	
password (	
father_name (	
national_code (	

birth_date (	
picture	 (	"1
CreateUserResponse

id (
message (	"�
UpdateUserRequest
user (

first_name (	
	last_name (	
mobile (	
email (	
password (	
father_name (	
national_code (	

birth_date	 (	
picture
 (	
code (	"1
UpdateUserResponse

id (
message (	2�
UserManagementGrpcQ
Create".user_management.CreateUserRequest#.user_management.CreateUserResponseQ
Update".user_management.UpdateUserRequest#.user_management.UpdateUserResponseB:�GRPC\\user_management� GRPC\\user_management\\GPBMetadatabproto3'
        , true);

        static::$is_initialized = true;
    }
}

