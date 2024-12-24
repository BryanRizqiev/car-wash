<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\StoreLoginRequest;
use App\Http\Requests\auth\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(StoreRegisterRequest $req)
    {
        $dataReq = $req->validated();
        $dataReq['role'] = 'Common';
        try {
            User::create($dataReq);
            return redirect('/auth/login')->with('success', 'Berhasil membuat user');
        } catch (\Throwable $th) {
            info($th->getMessage());
            return back()->with('error', 'Gagal membuat user');
        }
    }

    public function login(StoreLoginRequest $req)
    {
        $dataReq = $req->validated();

        if (Auth::attempt(['username' => $dataReq['username'], 'password' => $dataReq['password']])) {
            $req->session()->regenerate();

            return redirect()->intended('/');
        }
        return back()->with('error', 'Kredensial salah');
    }

    public function logout(Request $req)
    {
        Auth::logout();

        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return redirect('/auth/login');
    }

    public function loginIndex()
    {
        return view('content.authentications.auth-login');
    }

    public function registerIndex()
    {
        return view('content.authentications.auth-register');
    }
}
