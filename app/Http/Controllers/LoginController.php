<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    //menampilkan form login 
    public function formLogin() {
        return view('login.formLogin');
    }

    public function store(Request $request) {
        // request()->validate([
        //     'email' => 'required|email',
        //     'password' => ['required', 'string', Password::min(8)->numbers()->symbols()->mixedCase()],
        // ]);
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => ['required', 'string', Password::min(8)->numbers()->symbols()->mixedCase()],
        ]);

        if($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $kredensil = $request->only(['email', 'password']);
        if(Auth::attempt($kredensil)) {

            if($request->has('remember')) {
                Cookie::queue('remember', $request->remember,1440);
                Cookie::queue('email', $request->email,1440);
                Cookie::queue('password', $request->password,1440);
                
            }

            $request->session()->regenerate();
            return redirect()->intended('beranda');
        }

        return redirect()->back()->withInput()->with('loginGagal', 'login gagal');
    }

}
