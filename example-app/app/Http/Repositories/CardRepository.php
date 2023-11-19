<?php

namespace App\Http\Repositories;

use App\Models\Card;
use App\Models\UserCard;

class CardRepository
{
    public function getCardsForUser(int $userId): array
    {
        return UserCard::query()->where('user_id', '=', $userId)->get()->all();
    }

    public function getCard(int $cardId): Card
    {
        return Card::findOrFail($cardId);
    }
}
