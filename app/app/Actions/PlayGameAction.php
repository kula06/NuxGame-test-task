<?php

namespace App\Actions;

use App\Models\GameResult;
use App\Models\User;
use Random\RandomException;

class PlayGameAction
{
    protected const MIN_NUMBER = 1;
    protected const MAX_NUMBER = 1000;
    protected const SCALE = 2;

    protected const RULES = [
        900 => '0.7',
        600 => '0.5',
        300 => '0.3',
        0 => '0.1',
    ];

    /**
     * @throws RandomException
     */
    public function handle(User $user): GameResult
    {
        $number = $this->generateNumber();
        $isWin = $this->isWinningNumber($number);
        $winAmount = $isWin ? $this->calculate($number) : '0.00';

        return $user->gameResults()->create([
           'number' => $number,
           'is_win' => $isWin,
           'win_amount' => $winAmount,
        ]);
    }

    /**
     * @throws RandomException
     */
    protected function generateNumber(): int
    {
        return random_int(self::MIN_NUMBER, self::MAX_NUMBER);
    }

    protected function isWinningNumber(int $number): bool
    {
        return $number % 2 === 0;
    }

    protected function calculate(int $number): string
    {
        $rules = self::RULES;
        krsort($rules);

        foreach ($rules as $threshold => $percent) {
            if ($number > $threshold) {
                return bcmul((string) $number, $percent, self::SCALE);
            }
        }

        return '0.00';
    }
}
