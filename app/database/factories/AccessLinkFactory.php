<?php

namespace Database\Factories;

use App\Models\AccessLink;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AccessLinkFactory extends Factory
{
    protected $model = AccessLink::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'token' => Str::uuid(),
            'is_active' => $this->faker->boolean(),
            'expires_at' => Carbon::now()->addDays(7),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    public function forUser(User $user): self
    {
        return $this->state(fn () => [
            'user_id' => $user->id,
        ]);
    }

    public function active(): self
    {
        return $this->state(fn () => [
            'is_active' => true,
        ]);
    }

    public function expired(): self
    {
        return $this->state(fn () => [
            'expires_at' => now()->subDay(),
        ]);
    }
}
