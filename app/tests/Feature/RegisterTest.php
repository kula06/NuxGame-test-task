<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register(): void
    {
        $response = $this->post('/registration', [
            'username' => 'alex',
            'phone_number' => '1234567892',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', ['username' => 'alex']);
        $user = User::query()->where('username', 'alex')->first();
        $this->assertDatabaseHas('access_links', ['user_id' => $user->id]);
    }
}
