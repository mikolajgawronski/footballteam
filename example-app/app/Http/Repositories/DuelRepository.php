<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\Duel\DuelRepositoryInterface;
use App\Models\Duel;

class DuelRepository implements DuelRepositoryInterface
{
    public function getFinishedDuelsForUser(int $userId): array
    {
        return Duel::query()
            ->where(function ($query) use ($userId): void {
                $query->where('player_id', '=', $userId)
                    ->orWhere('opponent_id', '=', $userId);
            })
            ->where('status', '=', Duel::STATUS_FINISHED)
            ->get()
            ->all();
    }

    public function getActiveDuelForUser(int $userId): ?Duel
    {
        return Duel::query()
            ->where(function ($query) use ($userId): void {
                $query->where('player_id', '=', $userId)
                    ->orWhere('opponent_id', '=', $userId);
            })
            ->where('winner_id', '=', null)
            ->where('status', '=', Duel::STATUS_ACTIVE)
            ->first();
    }

    public function getLastDuelForUser(int $userId): ?Duel
    {
        return Duel::query()
            ->where(function ($query) use ($userId): void {
                $query->where('player_id', '=', $userId)
                    ->orWhere('opponent_id', '=', $userId);
            })
            ->where('winner_id', '!=', null)
            ->where('status', '=', Duel::STATUS_FINISHED)
            ->orderBy('id', 'desc')
            ->first();
    }
}
