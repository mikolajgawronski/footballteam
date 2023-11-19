<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class CardController extends Controller
{
    public function __construct(
        private CardRepository $cardRepository,
        private CardDataMapper $cardDataMapper,
    ) {}

    public function actionList(): JsonResponse
    {
        /** @var User $user */
        //        $user = Auth::user();
        $user = User::query()->firstOrFail();

        //get cards for user
        $cards = $this->cardRepository->getCardsForUser($user->id);
        $data = $this->cardDataMapper->getCardsResponseDataForUser($cards, $user);

        return new JsonResponse($data);
    }
}
