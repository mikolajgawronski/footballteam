<?php

namespace App\Http\Interfaces\User;

use App\Models\User;

interface UserDataMapperInterface
{
    public function getUserResponseData(array $userCards, User $user): array;
}
