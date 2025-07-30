<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class userController extends Controller
{
    // public function login(Request $request){
    //     $incomingFields= $request->validate([
    //         'name'=>'required',
    //         'password'=>'required'
    //     ]);

    //     if(auth()->attempt([
    //         'name'=>$incomingFields['loginname'], 
    //         'password'=>$incomingFields['loginpassword']]))
    //         {
    //         $request->session()->regenerate();
    //         return redirect('/');
    //     }
        
    // }

    public function login(Request $request){
    $incomingFields = $request->validate([
        'loginname' => 'required',
        'loginpassword' => 'required'
    ]);

    if (auth()->attempt([
        'name' => $incomingFields['loginname'],
        'password' => $incomingFields['loginpassword']
    ])) {
        $request->session()->regenerate();
        return redirect('/'); // ✅ Redirect only if login is successful
    }

    // ❌ If login fails, return back with error
    return back()->withErrors([
        'loginname' => 'The provided credentials do not match our records.',
    ])->onlyInput('loginname');
}


    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function register(Request $request){
        $incomingFields= $request->validate([
            'name'=>['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            'email'=>['required', 'email', Rule::unique('users', 'email')],
            'password'=>['required', 'min:8', 'max:240']
        ]);

        $incomingFields['password']= bcrypt($incomingFields['password']);
        $user=User::Create($incomingFields);
        auth()->login($user);
        return redirect('/');
    }
};
