<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/logout';

    private $password;

    public function authForm()
    {
        if(Auth::user())
        {
            return redirect('/');
        }

        return view('auth.form');
    }

    public function exitPage()
    {
        if(Auth::guest())
        {
            return redirect('/');
        }

        return view('auth.logout');
    }

    public function loginByPhone(Request $request)
    {
        $phone = $request->all()['phone'] ?? null;

        if(empty($phone))
        {
            return response()->json([
                'message' => 'Invalid phone'
            ], 404);
        }

        $user  = User::where('phone', $phone)->first();

        if(empty($user))
        {
            return response()->json([
                'message' => 'User not found by phone'
            ], 404);
        }

        $this->password = Str::random(6);

        $user->authorized_at = Carbon::now();
        $user->password = bcrypt($this->password);
        $user->save();

        $this->login($request);

        return response()->json([
            'message' => 'You are login! Please, reload page!',
        ], 200);
    }

    public function username()
    {
        return 'phone';
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            //'password' => 'required|string',
        ]);
    }

    protected function credentials(Request $request)
    {
        return [
            $this->username() => $request->all()['phone'],
            'password' => $this->password,
        ];
    }

    public function logout(Request $request)
    {
        $this->logout($request);
    }
}
