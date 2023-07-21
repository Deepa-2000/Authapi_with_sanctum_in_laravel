<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request){

        //login user
        if (!Auth::attempt($request->only('email','password'))) {
            Helper::sendError('Email or Password is wrong!!!');

        }
        //send response
        return new UserResource(auth()->user());
    }
}
