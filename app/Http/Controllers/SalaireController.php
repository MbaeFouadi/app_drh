<?php

namespace App\Http\Controllers;

use App\Models\salaire;
use App\Http\Requests\StoresalaireRequest;
use App\Http\Requests\UpdatesalaireRequest;
use App\Models\employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MercurySeries\Flashy\Flashy;

class SalaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*', 'roles.*')
        ->where("role_user.user_id", Auth::user()->id)->first();
        return view("pages.recherche_salaire",compact("role"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresalaireRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresalaireRequest $request)
    {
        //

        DB::table("salaire")->insert([
            'montant'=>$request->montant,
            'type'=>$request->type,
            'employer_id'=>$request->employer_id

        ]);

        Flashy::message('Statut initial créer avec succès');
        return redirect(route('salaire.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\salaire  $salaire
     * @return \Illuminate\Http\Response
     */
    public function show(salaire $salaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\salaire  $salaire
     * @return \Illuminate\Http\Response
     */
    public function edit(salaire $salaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesalaireRequest  $request
     * @param  \App\Models\salaire  $salaire
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesalaireRequest $request, salaire $salaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\salaire  $salaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(salaire $salaire)
    {
        //
    }

    public function recherche_user(Request $request)
    {
        $request->validate([
            'search'=>"required|exists:employers,matricule",
        ]);
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();

        $employer=employer::where('matricule','like','%'.$request->search.'%')->first();
        $salaire=DB::table("salaire")
        ->where("type",1)
        ->where("employer_id",$employer->id)
        ->get();
        return view("pages.salaire",compact("role","employer","salaire"));
        
    }
}
