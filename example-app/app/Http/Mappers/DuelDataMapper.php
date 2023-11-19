<?php

namespace App\Http\Mappers;

use App\Models\Duel;
use App\Models\User;

class DuelDataMapper
{
    public function getDuelsResponseDataForUser(array $duels, User $user): array
    {
        $data = [];

        foreach ($duels as $duel) {
            $data[] = [
                'id' => $duel->id,
                'player_name' => $this->getPlayerName($duel, $user),
                'opponent_name' => $this->getOpponentName($duel, $user),
                'won' => $this->checkIfUserWonDuel($duel, $user),
            ];
        }

        return $data;
    }

    private function getPlayerName(Duel $duel, User $user): string
    {
        return $user->name === $duel->player->name ? $duel->player->name : $duel->opponent->name;
    }

    private function getOpponentName(Duel $duel, User $user): string
    {
        return $user->name === $duel->player->name ? $duel->opponent->name : $duel->player->name;
    }

    private function checkIfUserWonDuel(Duel $duel, User $user): int
    {
        return $duel->winner_id === $user->id ? 1 : 0;
    }
}
