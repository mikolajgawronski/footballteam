<?php

namespace App\Http\Mappers;

use App\Http\Interfaces\Card\CardDataMapperInterface;
use App\Models\Card;

class CardDataMapper implements CardDataMapperInterface
{
    public function getCardsResponseData(Card $card): array
    {
        return [
                'id' => $card->id,
                'name' => $card->name,
                'power' => $card->power,
                'image' => $card->image,
            ];
    }

    public function prepareCardData(array $userCards): array
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
}
