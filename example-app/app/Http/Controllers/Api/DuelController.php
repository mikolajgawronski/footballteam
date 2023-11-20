<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Card\CardServiceInterface;
use App\Http\Interfaces\Duel\DuelDataMapperInterface;
use App\Http\Interfaces\Duel\DuelRepositoryInterface;
use App\Http\Interfaces\Duel\DuelServiceInterface;
use App\Http\Interfaces\User\UserRepositoryInterface;
use App\Http\Interfaces\User\UserServiceInterface;
use App\Http\Mappers\DuelDataMapper;
use App\Http\Repositories\DuelRepository;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class DuelController extends Controller
{
    public function __construct(
        private DuelRepositoryInterface $duelRepository,
        private UserRepositoryInterface $userRepository,
        private DuelDataMapperInterface $duelDataMapper,
        private DuelServiceInterface $duelService,
        private CardServiceInterface $cardService,
        private UserServiceInterface $userService,
    ) {}

    public function actionList(): JsonResponse
    {
        /** @var User $user */
        //        $user = Auth::user();
        $user = User::query()->firstOrFail();

        $duels = $this->duelRepository->getDuelsForUser($user->id);
        $data = $this->duelDataMapper->getDuelsResponseDataForUser($duels, $user);

        return new JsonResponse($data);
    }

    public function actionActiveDuel(): JsonResponse
    {
        /** @var User $user */
        //        $user = Auth::user();
        $user = User::query()->firstOrFail();
        $duel = $this->duelRepository->getActiveDuelForUser($user->id);

        if ($duel === null) {
            $opponent = $this->userRepository->getRandomOpponentForUser($user->id);
            $this->userService->prepareOpponentForDuel($opponent);
            $duel = $this->duelService->createDuel($user, $opponent);
            $this->cardService->addCardsForOpponent($opponent);
        }
        $data = $this->duelDataMapper->getActiveDuelResponseDataForUser($duel, $user);

        return new JsonResponse($data);
    }
}
