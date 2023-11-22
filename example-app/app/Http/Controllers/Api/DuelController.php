<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Duel\DuelDataMapperInterface;
use App\Http\Interfaces\Duel\DuelRepositoryInterface;
use App\Http\Interfaces\Duel\DuelServiceInterface;
use App\Http\Interfaces\User\UserRepositoryInterface;
use App\Http\Interfaces\User\UserServiceInterface;
use App\Http\Requests\PlayCardRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class DuelController extends Controller
{
    public function __construct(
        private DuelRepositoryInterface $duelRepository,
        private UserRepositoryInterface $userRepository,
        private DuelDataMapperInterface $duelDataMapper,
        private DuelServiceInterface $duelService,
        private UserServiceInterface $userService,
    ) {}

    public function actionList(): JsonResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $duels = $this->duelRepository->getFinishedDuelsForUser($user->id);
        $data = $this->duelDataMapper->getDuelsResponseDataForUser($duels, $user);

        return new JsonResponse($data);
    }

    public function actionStartTheDuel(): JsonResponse
    {
        /** @var User $user */
        $user = Auth::user();

        if ($this->duelRepository->getActiveDuelForUser($user->id)) {
            return new JsonResponse(['Message' => 'You already have an active duel! Resuming battle...']);
        }

        $opponent = $this->userRepository->getRandomOpponentForUser($user->id);
        $this->userService->prepareOpponentForDuel($opponent, $user->level);
        $duel = $this->duelService->createDuel($user, $opponent);

        return new JsonResponse(['Message' => 'Duel started!']);
    }

    public function actionActiveDuel(): JsonResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $duel = $this->duelRepository->getActiveDuelForUser($user->id) ?? $this->duelRepository->getLastDuelForUser($user->id);

        $data = $this->duelDataMapper->getActiveDuelResponseDataForUser($duel);

        return new JsonResponse($data);
    }

    public function actionPlayCard(PlayCardRequest $request): JsonResponse
    {
        /** @var User $user */
        $user = Auth::user();
        $duel = $this->duelRepository->getActiveDuelForUser($user->id);
        $opponent = $this->userRepository->getOpponentFromDuel($duel);

        $opponentCardPower = $this->duelService->getRandomCardPowerFromOpponent($opponent);
        $cardPower = $request->power;

        $this->duelService->updateDuel($duel, $cardPower, $opponentCardPower);

        return new JsonResponse(['Message' => 'Card played successfully!']);
    }
}
