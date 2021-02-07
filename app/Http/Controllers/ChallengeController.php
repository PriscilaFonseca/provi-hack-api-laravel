<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Challenge;
use App\Repositories\ChallengeRepositoryInterface;
use App\Http\Requests\ChallengeRegisterRequest;

class ChallengeController extends Controller
{
    private $challengeRepository;
    
    public function __construct(ChallengeRepositoryInterface $challengeRepository) 
    {
        $this->challengeRepository = $challengeRepository;
    }

    function getAll(Request $request) 
    {
        try {
            $challenges = $this->challengeRepository->all();
  
            return response(['challenges' => $challenges, 'isSuccess' => true], 200);        

        } catch(Exception $e) {
            return response([
                'error' => 'Something went wrong X_X',
                'errorMessage' => $e->getMessage(),
                'isSuccess' => false
            ], 500);
        }
    }

    function register(ChallengeRegisterRequest $request) 
    {
        try {
            $created = $this->challengeRepository->create($request);
    
            return response(['created' => ['challenge'=>$created], 'isSuccess' => true], 200);
        } catch(Exception $e) {
            return response([
                'error' => 'Something went wrong X_X',
                'errorMessage' => $e->getMessage(),
                'isSuccess' => false
            ], 500);
        }
    }
}
