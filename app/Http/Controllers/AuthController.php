<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    protected $jwt_auth;

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:api', ['except' => ['register', 'login']]);
    }

    public function register(Request $request)
    {
  
        $this->validate($request, [
            'email' => 'required|email',
            'username' => 'required|alpha_dash',
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create($request->all());
        return $this->login($request);
    }

    public function login(Request $request)
    {

        $login = $request->input('email');
        $login = filter_var($login, FILTER_SANITIZE_EMAIL);
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credentials = $request->only($field, 'password');

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(Auth::user());
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }

    protected function respondWithToken($token)
    {

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
            'user' => Auth::user()->username
        ]);
    }

    public function getCurrentToken()
    {
        $token = Auth::guard('api')->getToken()->get();
        return $this->respondWithToken($token);
    }
}