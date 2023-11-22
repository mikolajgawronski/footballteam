<?php

namespace Unit;

use App\Http\Interfaces\Duel\DuelRepositoryInterface;
use Tests\TestCase;

class DuelRepositoryTest extends TestCase
{
    private const TEST_USER_ID = 1;
    private const TEST_USER_WITH_NO_DUELS_ID = 3;

    private DuelRepositoryInterface $duelRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->duelRepository = $this->app->make(DuelRepositoryInterface::class);
    }

    public function test_that_duel_repository_returns_array(): void
    {
        $data = $this->duelRepository->getFinishedDuelsForUser(self::TEST_USER_ID);

        $this->assertIsArray($data);
        $this->assertGreaterThan(0, count($data));
    }

    public function test_that_duel_repository_returns_no_duels(): void
    {
        $data = $this->duelRepository->getFinishedDuelsForUser(self::TEST_USER_WITH_NO_DUELS_ID);

        $this->assertIsArray($data);
        $this->assertCount(0, $data);
    }

    public function test_last_duel_for_user_with_no_duels(): void
    {
        $data = $this->duelRepository->getLastDuelForUser(self::TEST_USER_WITH_NO_DUELS_ID);

        $this->assertNull($data);
    }

    public function test_last_duel_for_user_with_duels(): void
    {
        $data = $this->duelRepository->getLastDuelForUser(self::TEST_USER_ID);

        $this->assertNotNull($data);
    }
}
