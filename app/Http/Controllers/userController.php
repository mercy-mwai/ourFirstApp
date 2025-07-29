<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function register(Request $request){
        $incomingFields= $request->validate([
            'name'=>['required', 'min:3', 'max:10'],
            'email'=>['required', 'email'],
            'password'=>['required', 'min:8', 'max:240']
        ]);

        $incomingFields['password']= bcrypt($incomingFields['password']);
        User::Create($incomingFields);
        return 'Hello from our controller';
    }
};
