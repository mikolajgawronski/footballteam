<?php

namespace App\Http\Interfaces\Duel;

use App\Models\Duel;
use App\Models\User;

interface DuelDataMapperInterface
{
    public function getDuelsResponseDataForUser(array $duels, User $user): array;
    public function getActiveDuelResponseDataForUser(Duel $duel): array;
}
