<?php

namespace App\Actions;

use App\DTO\Registration\User\UserRegisterDTO;
use App\Models\User;
use Illuminate\Support\Facades\DB;

final readonly class UserRegister
{
    public function __construct(
        protected UserGenerateAccessLink $generateAccessLink,
    ) {}

    public function handle(UserRegisterDTO $dto): User
    {
        return DB::transaction(function () use ($dto) {
            $user = User::query()->firstOrCreate(
                ['phone_number' => ltrim($dto->phone_number, '+')],
                ['username' => $dto->username],
            );

            $this->generateAccessLink->handle($user);

            return $user->refresh();
        });
    }
}
