<?php

namespace App\Actions;

use App\Models\AccessLink;
use App\Models\User;
use Illuminate\Support\Str;

class UserGenerateAccessLink
{
    protected const LINK_VALIDITY_DAYS = 7;

    public function handle(User $user): AccessLink
    {
        return $user->accessLinks()->create([
            'token' => Str::uuid(),
            'expires_at' => now()->addMinutes(self::LINK_VALIDITY_DAYS),
            'is_active' => true,
        ]);
    }
}
