<?php

namespace App\Domain\Request;

class UserCreateEducationRequest implements BaseRequest
{
    public function getRules(): array
    {
        return [
            "user" => [
                "required"
            ],

            'university' => [
                ["string::longer", 2]
            ],

            "degree" => [
                'integer'
            ],

            "educationFile" => [
                ['regexp', '/\.(jpg|jpeg|png|gif)$/i']
            ]

        ];
    }

}
