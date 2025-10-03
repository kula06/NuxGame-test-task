<?php

namespace App\Actions;

use App\Models\User;

class UserDeactivateAccessLink
{
    public function handle(User $user): void
    {
        $user->accessLinks()->where('is_active', true)->update(['is_active' => false]);
    }
}
