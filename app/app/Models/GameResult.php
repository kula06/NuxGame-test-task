<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $number
 * @property bool $is_win
 * @property float $win_amount
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read User $user
 */
class GameResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'number',
        'is_win',
        'win_amount',
    ];

    protected $guarded = [
        //
    ];

    protected $casts = [
        'is_win' => 'boolean',
        'win_amount' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
