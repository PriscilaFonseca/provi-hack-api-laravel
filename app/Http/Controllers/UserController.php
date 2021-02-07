<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepositoryInterface;

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
        // $users = User::all();
        $users = $this->userRepository->all();

        $response = [
            'users' => $users
        ];

        return response($response, 200);        
    }

    function register(UserRegisterRequest $request) 
    {
        
    }
}
