<?php

namespace App\Repositories\Eloquent;

use App\models\Challenge;
use App\Repositories\ChallengeRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class ChallengeRepository extends BaseRepository implements ChallengeRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param Challenge $model
    */
   public function __construct(Challenge $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return $this->model->all();    
   }

    public function find($id) {
        return $this->model->find($id);
    }

   public function create(FormRequest $data): Model 
   {
       $challengeResult = $this->model->create([
            'title' => $data->title,
            'description' => $data->description,
            'id_area_expertise' => $data->id_area_expertise,
            'status' => 1,
        ]);        

        return $challengeResult;
   }
}