<?php

namespace App\Repositories\Eloquent;

use App\models\UserChallengeCompleted;
use App\Repositories\UserChallengeCompletedRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class UserChallengeCompletedRepository extends BaseRepository implements UserChallengeCompletedRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param UserChallengeCompleted $model
    */
   public function __construct(UserChallengeCompleted $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function all(int $id): Collection
   {
       return $this->model->where('id_user', $id)->get();    
   }

   public function create(FormRequest $data): Model 
   {
       $challengeResult = $this->model->create([
            'id_user' => $data->id_user,
            'id_challenge' => $data->id_challenge,
            'description' => $data->description,
            'used_techs' => $data->used_techs,
            'link' => $data->link,
            'status' => 1,
        ]);        

        return $challengeResult;
   }
}