<?php

namespace App\Http\Services;

use App\Http\Interfaces\Card\CardServiceInterface;
use App\Models\Card;
use App\Models\User;
use App\Models\UserCard;

class CardService implements CardServiceInterface
{
    public function addCardToUser(User $user, Card $card): void
    {
        $userCard = new UserCard();
        $userCard->user_id = $user->id;
        $userCard->card_id = $card->id;
        $userCard->save();
    }

    public function addCardsForOpponent(User $opponent, int $playerLevel): void
    {
        //get one random card
        $card = Card::query()
            ->inRandomOrder()
            ->first();

        foreach ($cards as $card) {
            $this->addCardToUser($opponent, $card);
        }
    }
}
