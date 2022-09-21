<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ForgotPasswordRequest;

class ForgotPassword extends Controller
{
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $email = $request->input('email');

        if (User::where('email', $email)->doesntExists()) {
            return response([
                'message' => 'User doesn\t exists!'
            ], 404);
        }
    }
}
