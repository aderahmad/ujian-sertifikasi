<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\PasswordResetTokens;
use App\Mail\LupaPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class ForgotController extends Controller
{
    public function formLupaPw() {
        return view('forgot.form-lupa-password');
    }

    public function prosesLupaPw(Request $req) {
        $this->validate($req, [
            'email' => 'required|string|email'
        ]);

        try {
            $datas = $req->all();
            $getData = User::where('email', $datas['email'])->first();
            if(empty($getData)) {
                return redirect()->route('forgot.forgot')->with('error', __('email salah'));
            }
            $token = Str::random(54);
            $dataPasswordResetTokens = PasswordResetTokens::where('email', $datas['email'])->first();
            if(!empty($dataPasswordResetTokens)){
                PasswordResetTokens::where('email', $datas['email'])->delete();
            }
            $datasToken = new PasswordResetTokens;
            $datasToken->email = $datas['email'];
            $datasToken->token = $token;
            $datasToken->created_at = date('Y-m-d H:i:s');
            $datasToken->save();

            $dataEmail = [
                'nama_pengguna' => $getData->name,
                'url_reset' => env('APP_URL') . '/forgot/reset-password/' . $token,
            ];

            Mail::to($datas['email'])->send(new LupaPasswordMail($dataEmail));

            return redirect()->route('forgot.forgot')->with('success', __('Silahkan periksa emial Anda'));
        } catch (\Throwable $th) {
            return redirect()->route('forgot.forgot')->with('error', __($th->getMessage()));
        }
    }

    public function resetPassword($token) {
        $dataReset = PasswordResetTokens::where('token', $token)->whereDate('created_at', '=', date('Y-m-d'))->first();
        if(empty($dataReset)) {
            return redirect()->route('forgot.forgot')->with('error',__('Token tidak valid'));
        }
        $token = $token;
        $email = $dataReset->email;

        return view('forgot.form-atur-ulang-password', compact('email', 'token'));
    }

    public function prosesResetPassword(Request $req)
    {

        $this->validate($req, [
            'password' => 'required|string|min:8|confirmed',
        ]);

        $datas = $req->all();
        User::where('email', $datas['email'])->update([
            'password' => Hash::make($datas['password'])
        ]);

        passwordResetTokens::where('email', $datas['email'])->delete();

        return redirect()->route('login.formLogin')->with('success', __('Reset password sukses'));
    }
}
