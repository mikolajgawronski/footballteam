<?php

namespace App\Http\Interfaces\Card;

use App\Models\Card;

interface CardRepositoryInterface
{
    public function getCardsForUser(int $userId): array;
    public function getCard(int $cardId): Card;
    public function getRandomCard(): Card;
}
