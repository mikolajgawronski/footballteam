<?php

namespace App\Http\Controllers;

use App\Http\Mappers\DuelDataMapper;
use App\Http\Repositories\DuelRepository;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class DuelController extends Controller
{
    public function __construct(
        private DuelRepository $duelRepository,
        private DuelDataMapper $duelDataMapper,
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
}
