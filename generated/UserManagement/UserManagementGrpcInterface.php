<?php
# Generated by the protocol buffer compiler (roadrunner-server/grpc). DO NOT EDIT!
# source: user_management.proto

namespace GRPC\UserManagement;

use Spiral\RoadRunner\GRPC;

interface UserManagementGrpcInterface extends GRPC\ServiceInterface
{
    // GRPC specific service name.
    public const NAME = "user_management.UserManagementGrpc";

    /**
    * @param GRPC\ContextInterface $ctx
    * @param CreateUserRequest $in
    * @return CreateUserResponse
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function Create(GRPC\ContextInterface $ctx, CreateUserRequest $in): CreateUserResponse;

    /**
    * @param GRPC\ContextInterface $ctx
    * @param UpdateUserRequest $in
    * @return UpdateUserResponse
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function Update(GRPC\ContextInterface $ctx, UpdateUserRequest $in): UpdateUserResponse;
}
