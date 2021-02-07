<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface ChallengeRepositoryInterface
{
   public function all(): Collection;
   public function find(int $id);
}