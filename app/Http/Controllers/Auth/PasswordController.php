<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'ChangePassword']);
    }

    public function ChangePassword(Request $request)
    {

        if($request->getMethod()=='POST')
        {
            $user=auth()->user();

            $this->validate($request, [
                'old_password' => 'required',
                'new_password' => 'required|min:6',
            ]);

            if(Hash::check($request->old_password, $user->password))
            {
                $user->password = bcrypt($request->new_password);
                $user->save();

                return redirect()->to('/')->with('status', 'Password changed!');
            }

            return redirect()->back()->withErrors(['error'=>'Invalid current password']);

        }

        return view('auth.change-password');
    }

}
