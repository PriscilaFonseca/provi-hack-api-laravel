<?php

namespace App\Repositories\Eloquent;

use App\models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

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

   public function create(array $data): Model 
   {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'user_type' => $request->user_type,            
        ]);

        $user->profile = UserProfile::create([
            'id_user' => $user->id,
            'avatar' => $request->avatar,
            'bio' => $request->bio,
            'linkedin' => $request->linkedin,
            'behance' => $request->behance,
            'github' => $request->github,
            'stacks' => $request->stacks,
            'main_technology' => $request->main_technology,
        ]);

        return $user;
   }
}