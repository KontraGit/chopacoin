<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wallet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'version',
        'wif',
        'address',
        'currency',
        'sign',
        'time_zone',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}