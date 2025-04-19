<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ResponseController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends ResponseController
{

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->validationFailed(ALL_FIELDS_REQUIRED, $validator->errors());
        }

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {

            return $this->sendFailure("Invalid Credentials", [
                'errors' => ['email' => 'Email or Password is Invalid']
            ]);
        }

        $token = $user->createToken('navjot', ['server:update'])->plainTextToken;

        return $this->sendSuccess(SUCCESS, [
            'accessToken' => $token,
            'token_type' => 'Bearer',
            'userData' =>  $user,
        ]);
    }
}
