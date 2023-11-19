<?php

namespace App\Http\Repositories;

use App\Models\Duel;

class DuelRepository
{
    public function getDuelsForUser(int $userId): array
    {
        return Duel::query()->where('player_id', '=', $userId)->orWhere('opponent_id', '=', $userId)->get()->all();
    }
}
