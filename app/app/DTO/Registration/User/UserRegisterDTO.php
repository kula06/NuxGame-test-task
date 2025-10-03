<?php

namespace App\DTO\Registration\User;

use App\DTO\Registration\BaseDTO;

final readonly class UserRegisterDTO extends BaseDTO
{
    public function __construct(
        public string $username,
        public string $phone_number
    ) {
    }
}
