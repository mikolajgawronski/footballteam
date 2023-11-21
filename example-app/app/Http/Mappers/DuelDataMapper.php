<?php

namespace App\Http\Mappers;

use App\Http\Interfaces\Card\CardDataMapperInterface;
use App\Http\Interfaces\Card\CardRepositoryInterface;
use App\Http\Interfaces\Duel\DuelDataMapperInterface;
use App\Models\Duel;
use App\Models\User;

class DuelDataMapper implements DuelDataMapperInterface
{
    public function __construct(
        private CardRepositoryInterface $cardRepository,
        private CardDataMapperInterface $cardDataMapper,
    ) {}

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

    public function getActiveDuelResponseDataForUser(Duel $duel): array
    {
        $userCards = $this->cardRepository->getCardsForUser($duel->player_id);
        $cards = $this->cardDataMapper->prepareCardData($userCards);

        return [
            'round' => $duel->current_round,
            'your_points' => $duel->player_score,
            'opponent_points' => $duel->opponent_score,
            'status' => $duel->status,
            'cards' => $cards,
        ];
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
