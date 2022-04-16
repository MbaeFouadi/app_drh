<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class pageController extends Controller
{

    public function composante()
    {
        return view('pages.composante');
    }

    public function service()
    {
        return view('pages.service');
    }

    public function fonction()
    {
        return view('pages.fonction');
    }
    // public function annee()
    // {
    //     return view('pages.Année');
    // }

    // public function identite()
    // {
    //     return view('pages.identite');
    // }

    // public function formation()
    // {
    //     return view('pages.formation');
    // }

    // public function statut()
    // {
    //     return view('pages.statut');
    // }

    // public function avancement()
    // {
    //     return view('pages.avancement');
    // }

    // public function affectation()
    // {
    //     return view('pages.affectation');
    // }

    public function utilisateur()
    {
        return view('pages.showUser');
    }

    public function profil()
    {
        return view('pages.profil');
    }

    public function recherche()
    {
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        return view('pages.rechercheFiche',compact('role'));
    }

    public function fiche()
    {
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        return view('pages.rechercheFiche',compact('role'));
    }

    public function login()
    {
       return view('pages.login');
    }


    public function fiches()
    {
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
       return view('pages.fiche', compact('role'));
    }


    // public function coprs()
    // {
    //    return view('pages.corps');
    // }

    // public function classes()
    // {
    //    return view('pages.classes');
    // }

    // public function echelons()
    // {
    //    return view('pages.echelons');
    // }

    // public function indices()
    // {
    //    return view('pages.indices');
    // }

    // public function affectations()
    // {
    //    return view('pages.affectations');
    // }

}
