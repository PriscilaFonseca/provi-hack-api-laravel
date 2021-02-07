<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface UserChallengeCompletedRepositoryInterface
{
   public function all(int $id): Collection;
}