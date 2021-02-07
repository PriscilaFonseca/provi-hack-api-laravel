<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepositoryInterface;
use App\Http\Requests\UserRegisterRequest;

class UserController extends Controller
{
    private $userRepository;
    
    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    function authenticate(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['Invalid credentials.']
            ], 404);
        }
    
        $token = $user->createToken('new_token')->plainTextToken;
    
        $response = [
            'user' => $user,
            'token' => $token
        ];
    
        return response($response, 201);
    }

    function getAll(Request $request) 
    {
        $users = $this->userRepository->all();

        $response = [
            'users' => $users
        ];

        return response($response, 200);        
    }

    function register(UserRegisterRequest $request) 
    {
        try {

            $validated = $request->validated();
   
            $created = $this->userRepository->create($request);
    
            return response(['created' => ['user'=>$created], 'isSuccess' => true], 200);

        } catch(Exception $e) {
            return response([
                'error' => 'Something went wrong X_X',
                'errorMessage' => $e->getMessage(),
                'isSuccess' => false
            ], 500);
        }        
    }

    function getById(int $id) 
    {
        try {

            $user = $this->userRepository->find($id);
            return response(['user' => $user, 'isSuccess' => true]);
            
        } catch(Exception $e) {
            return response([
                'error' => 'Something went wrong X_X',
                'errorMessage' => $e->getMessage(),
                'isSuccess' => false
            ], 500);
        }
    }
}
