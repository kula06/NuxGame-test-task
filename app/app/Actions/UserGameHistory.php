<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Collection;

class UserGameHistory
{
    protected const LIMIT = 3;

    public function handle(User $user): Collection
    {
        return $user->gameResults()->latest()->take(self::LIMIT)->get();
    }
}
