<?php

namespace App\Http\Services;

use App\Http\Interfaces\Card\CardServiceInterface;
use App\Http\Interfaces\Duel\DuelServiceInterface;
use App\Models\Card;
use App\Models\Duel;
use App\Models\User;
use App\Models\UserCard;

class DuelService implements DuelServiceInterface
{
    public function createDuel(User $player, User $opponent): Duel
    {
        $duel = new Duel();
        $duel->player_id = $player->id;
        $duel->opponent_id = $opponent->id;
        $duel->save();

        return $duel;
    }
}
