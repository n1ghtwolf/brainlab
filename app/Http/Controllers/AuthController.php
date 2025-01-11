<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Http\Requests\AdminAuthRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.adminlte.login');
    }

    public function login(AdminAuthRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status == StatusEnum::Active) {
                return redirect()->route('admins.index');
            }

            Auth::logout();
            return back()->withErrors(['status' => 'Ваш аккаунт неактивен.']);
        }

        return back()->withErrors(['email' => 'Неверные учетные данные']);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
