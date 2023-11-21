<?php

namespace App\Http\Interfaces\Duel;

use App\Models\Duel;
use App\Models\User;

interface DuelServiceInterface
{
    public function createDuel(User $player, User $opponent): Duel;
    public function getRandomCardPowerFromOpponent(User $opponent): int;
    public function updateDuel(Duel $duel, int $playerScore, int $opponentScore): void;
}
