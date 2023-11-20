<?php

namespace App\Http\Interfaces\Duel;

use App\Models\Duel;
use App\Models\User;

interface DuelServiceInterface
{
    public function createDuel(User $player, User $opponent): Duel;
}
