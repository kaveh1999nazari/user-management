<?php

namespace App\Domain\Request;

class UserCreateResidentRequest implements BaseRequest
{
    public function getRules(): array
    {
        return [
            "user" => [
                "required"
            ],

            'address' => [
                ["string::longer", 2]
            ],

            "postalCode" => [
                ['regexp', '/[0-9]{10}$/'],
            ],

            "province" => [
                'integer'
            ],

            'city' => [
                'integer'
            ],

            "postalCodeFile" => [
                ['regexp', '/\.(jpg|jpeg|png|gif)$/i']
            ]
        ];
    }
}
