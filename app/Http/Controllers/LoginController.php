<?php

namespace App\Http\Controllers;

use Auth, Hash, Str;
use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\{
    RedirectResponse,
    Request
};

class LoginController extends Controller
{
    public function index(): View
    {
        $authenticate = app('request')->input('authenticate');

        return view('auth.login', [
            'authenticate' => ($authenticate == "false") ? false : true
        ]);
    }

    public function auth(Request $request): RedirectResponse
    {
        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        return (Auth::attempt($user_data)) ? redirect('/') : redirect('/login?authenticate=false');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect('/login');
    }

    public function forgotPassword(): View
    {
        return view('auth.forgotPassword');
    }

    public function resetPassword(Request $request): RedirectResponse
    {
        $user = User::whereEmail($request->get('email'))->first();
        $redirect = '/forgot-password?email=false';
        if ($user) {
            $this->sendEmail($user);
            $redirect = '/forgot-password?email=true';
        }

        return redirect($redirect);
    }

    private function sendEmail(User $user): void
    {
        $newPassword = Str::random(6);
        $inputs = ['newPassword' => $newPassword];
        $user->password = Hash::make($newPassword);
        $user->save();
        Mail::to($user->email)
            ->send(new ForgotPassword($user->first_name, $inputs));
    }
}
