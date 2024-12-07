<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function formRegister() {
        return view('register.formRegister');
    }

    public function processRegister(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => ['required', 'string', Password::min(8)->numbers()->symbols()->mixedCase()],
            ]);
    
            if($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }
    
            $kredensil = $request->all();
            $save_user = new User;
            $save_user->name = $kredensil['name'];
            $save_user->email = $kredensil['email'];
            $save_user->password = $kredensil['password'];
            $save_user->save();
            return redirect()->route('register.formRegister')->with('success', 'Register Berhasil');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }
}
