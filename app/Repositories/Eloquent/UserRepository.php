<?php

namespace App\Repositories\Eloquent;

use App\models\User;
use App\models\UserProfile;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    /**
    * UserRepository constructor.
    *
    * @param User $model
    */
    public function __construct(User $model)
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
        return $this->model->with('profile')->find($id);
    }

    public function create(FormRequest $data): Model 
    {
       $userResult = null;

       DB::transaction(function() use($data, &$userResult) {

            $userResult = $this->model->create([
                'name' => $data->name,
                'email' => $data->email,
                'password' => $data->password,
                'user_type' => $data->user_type,            
            ]);

            $userResult->profile = UserProfile::create([
                'id_user' => $userResult->id,
                'avatar' => $data->avatar,
                'bio' => $data->bio,
                'linkedin' => $data->linkedin,
                'behance' => $data->behance,
                'github' => $data->github,
                'stacks' => $data->stacks,
                'main_technology' => $data->main_technology,
                'phone' => $data->phone,
                'state' => $data->state,
                'medium' => $data->medium,
            ]);
        
        }, 5);        

        return $userResult;
    }
}