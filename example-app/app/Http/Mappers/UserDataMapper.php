<?php

namespace App\Http\Mappers;

use App\Http\Interfaces\User\UserDataMapperInterface;
use App\Models\Card;
use App\Models\User;

class UserDataMapper implements UserDataMapperInterface
{
    public function getUserResponseData(array $userCards, User $user): array
    {
        return [
            'id' => $user->id,
            'username' => $user->name,
            'level' => $user->level,
            'level_points' => $this->prepareLevelPointsData($user),
            'cards' => $this->prepareCardsData($userCards),
            'new_card_allowed' => $this->checkIfNewCardAllowed($userCards, $user),
        ];
    }

    private function prepareCardsData(array $userCards): array
    {
        $data = [];

        foreach ($userCards as $userCard) {
            /** @var Card $card */
            $card = $userCard->card;

            $data[] = [
                'id' => $card->id,
                'name' => $card->name,
                'power' => $card->power,
                'image' => $card->image,
            ];
        }

        return $data;
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
