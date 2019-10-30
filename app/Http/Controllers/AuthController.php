<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller {

    public function login() { 
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')]))
        { 
            $user = Auth::user(); $success['token'] = $user->createToken('api')-> accessToken; 
            return response()->json(['success' => $success], 200); 
        } else
        { 
            return response()->json(['error'=>'Unauthorised'], 401); 
        }
    }

    public function register (Request $request) { 

        $validator = Validator::make($request->all(), [ 'name' => 'required', 'email' => 'required|email', 'password' => 'required', 'confirm_password' => 'required|same:password']);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401); 
        } 
        
        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
        $success['token'] = $user->createToken('api')-> accessToken; 
        $success['name'] = $user->name; 

        return response()->json(['success'=>$success], 200); 
    } 
       /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        return response()->json(['user' => auth()->user('api')], 200);
    }
    
}