<?php

namespace App\Http\Controllers\Conges\Auth;

use App\Models\User;
use App\Models\employer;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{

    public function index()
    {
        $users=User::all();
        $roles=DB::table('roles')->get();
        return view('pages.showUser',compact('users','roles'));
    }
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'pseudo' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);

         $user=User::create([
            'name' => $request->pseudo,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->attachRole($request->role_id);
        event(new Registered($user));

        // Auth::login($user);

        return redirect('utilisateur');
    }

    public function profil()
    {
        $employer=employer::where('id',Auth::user()->id)->first();

        return view('pages.conges.profil',compact('employer'));
    }
}
