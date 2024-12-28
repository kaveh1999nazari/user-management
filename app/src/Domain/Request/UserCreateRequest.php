<?php

namespace App\Domain\Request;

class UserCreateRequest implements BaseRequest
{
    public function getRules(): array
    {
        return [
            "firstName" => [
                'required',
                ['string::longer', 2]
            ],

            "lastName" => [
                'required',
                ['string::longer', 2]
            ],

            'mobile' => [
                'required',
                ['regexp', '/^0[0-9]{10}$/'],
            ],

            "email" => [
                'required',
                ['regexp', '/^[A-Za-z0-9._%+-]+@[A-Za-z.-]+\.[a-zA-Z]{2,}$/']
            ],

            'password' => [
                'required',
                ['string::longer', 5],
                ['string::shorter', 10],
            ],

            "fatherName" => [
                ['string::longer', 2]
            ],

            "nationalCode" => [
                'required',
                ['regexp', '/[0-9]{10}$/'],
            ],

            "birthDate" => [
                ['regexp', '/^\d{4}-\d{2}-\d{2}$/'],
            ],

            "picture" => [
                ['regexp', '/\.(jpg|jpeg|png|gif)$/i']
            ]
        ];
    }
}
