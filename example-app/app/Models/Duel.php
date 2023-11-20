<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $player_id
 * @property int $opponent_id
 * @property int $winner_id
 * @property int $current_round
 * @property string $status
 * @property string $player_points
 * @property string $opponent_points
 */
class Duel extends Model
{
    use HasFactory;

    public const STATUS_ACTIVE = 'active';
    public const STATUS_FINISHED = 'finished';
    public const MAX_ROUNDS = 5;

    public function player(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function opponent(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function winner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
