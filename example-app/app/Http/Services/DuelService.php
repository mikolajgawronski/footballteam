<?php

namespace App\Http\Services;

use App\Http\Interfaces\Card\CardRepositoryInterface;
use App\Http\Interfaces\Duel\DuelServiceInterface;
use App\Models\Duel;
use App\Models\User;

class DuelService implements DuelServiceInterface
{
    public function __construct(
        private CardRepositoryInterface $cardRepository,
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
        $chosenCard = $this->cardRepository->getCard($opponentCards[array_rand($opponentCards)]->card_id);

        return $chosenCard->power;
    }

    public function updateDuel(Duel $duel, int $playerScore, int $opponentScore): void
    {
        $duel->player_score += $playerScore;
        $duel->opponent_score += $opponentScore;

        if ($duel->current_round === 5) {
            $duel->status = Duel::STATUS_FINISHED;
            $duel->winner_id = $this->checkForWinner($duel);
        }

        if ($duel->current_round < 5) {
            ++$duel->current_round;
        }

        $duel->save();
    }

    private function checkForWinner(Duel $duel): int
    {
        return $duel->player_points > $duel->opponent_points ? $duel->player_id : $duel->opponent_id;
    }
}
