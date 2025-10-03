<?php

namespace Database\Factories;

use App\Models\GameResult;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GameResultFactory extends Factory
{
    protected $model = GameResult::class;

    public function definition(): array
    {
        $number = $this->faker->randomNumber();
        $isWin = $number % 2 === 0;
        $winAmount = $isWin ? $this->faker->randomFloat() : 0;

        return [
            'number' => $number,
            'is_win' => $isWin,
            'win_amount' => $winAmount,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
        ];
    }
}
