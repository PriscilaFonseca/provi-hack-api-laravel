<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\UserChallengeCompleted;
use App\Repositories\UserChallengeCompletedRepositoryInterface;
use App\Http\Requests\UserChallengeCompletedRegisterRequest;

class UserChallengeCompletedController extends Controller
{
    private $userChallengeCompletedRepository;
    
    public function __construct(UserChallengeCompletedRepositoryInterface $userChallengeCompletedRepository) 
    {
        $this->userChallengeCompletedRepository = $userChallengeCompletedRepository;
    }

    function getById(int $id) 
    {
          try {
            $challenges = $this->userChallengeCompletedRepository->all($id);
  
            return response(['challenges-completed' => $challenges, 'isSuccess' => true], 200);        

        } catch(Exception $e) {
            return response([
                'error' => 'Something went wrong X_X',
                'errorMessage' => $e->getMessage(),
                'isSuccess' => false
            ], 500);
        }
    }

    function register(UserChallengeCompletedRegisterRequest $request) 
    {
        try {

            $validated = $request->validated();

            $created = $this->userChallengeCompletedRepository->create($request);
    
            return response(['created' => ['challenge-completed'=>$created], 'isSuccess' => true], 200);       

        } catch(Exception $e) {
            return response([
                'error' => 'Something went wrong X_X',
                'errorMessage' => $e->getMessage(),
                'isSuccess' => false
            ], 500);
        }
    }
}
