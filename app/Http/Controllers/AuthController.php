<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm (){
        return view('auth.index');
    }

    public function login(Request $request){
//        dd($request->all());
        $validatedData = $request->validate([
            'email' => ['email', 'required'],
            'password' => ['string', 'required']
        ]);

        $user = Auth::attempt([
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ]);

        if($user){
            $request->session()->regenerate();
            return redirect(route('dashboard'));
        }else return back();
    }

    public function register (Request $request){
        $validatedData = $request->validate([
            'full_name' => ['string', 'required'],
            'phone_number' => ['string', 'required', 'unique:users,phone_number'],
            'email' => ['email', 'required', 'unique:users,email'],
            'password' => ['string', 'required']
        ]);

        User::create([
            'name' => $validatedData['full_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'phone_number'=> $validatedData['phone_number']
        ]);


        $user = Auth::attempt([
            'email' =>$validatedData['email'],
            'password' => $validatedData['password'],
        ]);

        if ($user){
            return redirect(route('dashboard'));
        }else return redirect(route('login'));
    }

    public function logout(Request $request){
        $request->session()->invalidate();
        return redirect()->intended(route('login'));
    }
}
