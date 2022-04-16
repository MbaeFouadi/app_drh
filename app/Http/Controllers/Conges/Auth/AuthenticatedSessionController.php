<?php

namespace App\Http\Controllers\Conges\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Hash;

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
    public function store(Request $request)
    {

        $mat=DB::table('employers')->where('matricule',$request->matricule)->first();
        if($mat)
        {
            if(Hash::check($request->password,$mat->password))
            {
                // $request->authenticate();
                // $request->session()->regenerate();
                Session::put('employer', $mat);
                $session =  Session::get('employer');
                // dd($session->nom);

                //$mat->session()->all();
                // $role = DB::table('role_user')
                // ->join('roles', 'role_user.role_id', '=', 'roles.id')
                // ->select('role_user.*','roles.*')
                // ->where("role_user.user_id",Auth::user()->id)->first();
                // $employe = DB::table('employers')
                // ->join('conges','employers.id','=','conges.id_employe')
                // ->where('employers.id',Auth::user()->id)
                // ->select('employers.*','conges.id as idConge','conges.date_debut','conges.nombre_heure','conges.heure')
                // ->first();
                // return view('conges.conges.demande',compact('employe'));
                return redirect('conges/accueil');

            }
        }
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
