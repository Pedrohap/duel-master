<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }

    public function recoverPassword()
    {
        return view('auth.recoverPassword');
    }

    public function changePassword(Request $request){
        $user = User::where('email',$request->email)->get();
        if($user[0] != null){
            $user = $user[0];
            $user->password=$request->password;
            $user->save();
        }

        return $this->show();
    }

    /**
     * Handle account login request
     * 
     * @param LoginRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user) 
    {
        return redirect()->intended();
    }
}