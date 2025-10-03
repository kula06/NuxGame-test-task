<?php

namespace Tests\Feature;

use App\Models\AccessLink;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlayGameTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanPlayGame(): void
    {
        $user = User::factory()->create();

        $accessLink = AccessLink::factory()->forUser($user)->active()->create();

        $response = $this->post(route('game.play', ['token' => $accessLink->token]));

        $response->assertStatus(302);
        $this->assertDatabaseCount('game_results', 1);
    }

    public function testUserCannotPlayWithExpiredToken(): void
    {
        $user = User::factory()->create();

        $accessLink = AccessLink::factory()->forUser($user)->expired()->create();

        $response = $this->post(route('game.play', ['token' => $accessLink->token]));

        $response->assertStatus(404);
    }
}
