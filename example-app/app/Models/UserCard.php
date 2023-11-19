<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $card_id
 */
class UserCard extends Model
{
    use HasFactory;

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }
}
