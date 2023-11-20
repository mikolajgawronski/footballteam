<?php

namespace App\Http\Mappers;

use App\Http\Interfaces\Card\CardDataMapperInterface;
use App\Http\Interfaces\User\UserDataMapperInterface;
use App\Models\User;

class UserDataMapper implements UserDataMapperInterface
{
    public function __construct(
        private CardDataMapperInterface $cardDataMapper,
    ) {}

    public function getUserResponseData(array $userCards, User $user): array
    {
        return [
            'id' => $user->id,
            'username' => $user->name,
            'level' => $user->level,
            'level_points' => $this->prepareLevelPointsData($user),
            'cards' => $this->cardDataMapper->prepareCardData($userCards),
            'new_card_allowed' => $this->checkIfNewCardAllowed($userCards, $user),
        ];
    }

    private function prepareLevelPointsData(User $user): string
    {
        return match ($user->level) {
            1 => $user->level_points . '/' . User::POINTS_REQUIRED_TO_LEVEL_TWO,
            2 => $user->level_points . '/' . User::POINTS_REQUIRED_TO_LEVEL_THREE,
            default => $user->level_points,
        };
    }

    private function checkIfNewCardAllowed(array $userCards, User $user): bool
    {
        if (count($userCards) < $user->level * User::CARDS_ALLOWED_PER_LEVEL) {
            return true;
        }

        return false;
    }
}
