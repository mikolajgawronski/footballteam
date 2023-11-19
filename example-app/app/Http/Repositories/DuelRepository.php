<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\Duel\DuelRepositoryInterface;
use App\Models\Duel;

class DuelRepository implements DuelRepositoryInterface
{
    public function getDuelsForUser(int $userId): array
    {
        return Duel::query()->where('player_id', '=', $userId)->orWhere('opponent_id', '=', $userId)->get()->all();
    }
}
