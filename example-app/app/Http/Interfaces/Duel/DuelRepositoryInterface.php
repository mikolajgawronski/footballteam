<?php

namespace App\Http\Interfaces\Duel;

use App\Models\Duel;

interface DuelRepositoryInterface
{
    public function getFinishedDuelsForUser(int $userId): array;
    public function getActiveDuelForUser(int $userId): ?Duel;
    public function getLastDuelForUser(int $userId): ?Duel;
}
