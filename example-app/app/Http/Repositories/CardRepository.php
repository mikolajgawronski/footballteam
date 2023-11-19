<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\Card\CardRepositoryInterface;
use App\Models\Card;
use App\Models\UserCard;

class CardRepository implements CardRepositoryInterface
{
    public function getCardsForUser(int $userId): array
    {
        return UserCard::query()->where('user_id', '=', $userId)->get()->all();
    }

    public function getCard(int $cardId): Card
    {
        return Card::findOrFail($cardId);
    }

    public function getRandomCard(): Card
    {
        return Card::query()->inRandomOrder()->firstOrFail();
    }
}
