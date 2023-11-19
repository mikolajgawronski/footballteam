<?php

namespace App\Http\Interfaces\Duel;

interface DuelRepositoryInterface
{
    public function getDuelsForUser(int $userId): array;
}
