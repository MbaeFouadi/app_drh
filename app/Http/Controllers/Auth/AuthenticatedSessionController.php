<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // return view('index');
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        // return redirect()->intended(RouteServiceProvider::HOME,compact('role'));
        return view('index',compact('role'));
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

        $request->authenticate();
        $request->session()->regenerate();
        
        // $role = DB::table('role_user')
        // ->join('roles', 'role_user.role_id', '=', 'roles.id')
        // ->select('role_user.*','roles.*')
        // ->where("role_user.user_id",Auth::user()->id)->get();
        return redirect()->intended(RouteServiceProvider::HOME);
        // return view('index',compact('role'));

        // if(Auth::user()->hasRole('superadministrateur'))
        // {

        //     return redirect()->intended(RouteServiceProvider::HOME);
        // }
        // elseif(Auth::user()->hasRole('user'))
        // {

        //     return view('pages.identite');

        // }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
