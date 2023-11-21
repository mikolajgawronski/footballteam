<?php

namespace App\Http\Services;

use App\Http\Interfaces\Card\CardRepositoryInterface;
use App\Http\Interfaces\Duel\DuelServiceInterface;
use App\Http\Interfaces\User\UserServiceInterface;
use App\Models\Duel;
use App\Models\User;

class DuelService implements DuelServiceInterface
{
    public function __construct(
        private CardRepositoryInterface $cardRepository,
        private UserServiceInterface $userService,
    ) {}

    public function createDuel(User $player, User $opponent): Duel
    {
        $duel = new Duel();
        $duel->player_id = $player->id;
        $duel->opponent_id = $opponent->id;
        $duel->save();

        return $duel;
    }

    public function getRandomCardPowerFromOpponent(User $opponent): int
    {
        $opponentCards = $this->cardRepository->getCardsForUser($opponent->id);
        $cardFromOpponent = $opponentCards[array_rand($opponentCards)];

        $cardPower = $this->cardRepository->getCard($cardFromOpponent->card_id)->power;
        //        $cardFromOpponent->delete();

        return $cardPower;
    }

    public function updateDuel(Duel $duel, int $playerScore, int $opponentScore): void
    {
        $duel->player_score += $playerScore;
        $duel->opponent_score += $opponentScore;

        if ($duel->current_round === 5) {
            $duel->status = Duel::STATUS_FINISHED;
            $duel->winner_id = $this->checkForWinner($duel);
            $this->userService->grantLevelPointsToWinner($duel->winner);
        }

        if ($duel->current_round < 5) {
            ++$duel->current_round;
        }

        $duel->save();
    }

    private function checkForWinner(Duel $duel): int
    {
        return $duel->player_score > $duel->opponent_score ? $duel->player_id : $duel->opponent_id;
    }
}
