<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $username
 * @property string $phone_number
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Collection|AccessLink[] $accessLinks
 * @property-read ?AccessLink $activeAccessLink
 */
class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'username',
        'phone_number',
    ];

    protected $guarded = [
        //
    ];

    public function accessLinks(): HasMany
    {
        return $this->hasMany(AccessLink::class);
    }

    public function activeAccessLink(): HasOne
    {
        return $this->hasOne(AccessLink::class)->active()->latestOfMany();
    }
}
