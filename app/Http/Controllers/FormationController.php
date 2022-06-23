<?php

namespace App\Http\Controllers;

use App\Models\employer;
use App\Models\formation;
use Illuminate\Http\Request;
use App\Models\employer_formation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;


class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        $employer=employer::where('user_id',Auth::user()->id)->orderBydesc('id')->first();
        return view('pages.formation',compact('employer','role'));

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'diplome'=>"required",
            'annee'=>"required",
            'lieu'=>"required",
            'genre'=>"required"
        ]);

        formation::create(['diplome'=>$request->diplome,
        'annee'=>$request->annee,
        'lieu'=>$request->lieu,
        'genre'=>$request->genre,
        'user_id'=>Auth::user()->id
        ]);

        $formation=formation::where('user_id',Auth::user()->id)->orderByDesc('id')->first();
        // $employer=employer::where('user_id',Auth::user()->id)->orderByDesc('id')->first();

        employer_formation::create([
            'employer_id'=>$request->employer_id,
            'formation_id'=>$formation->id,
            'user_id'=>Auth::user()->id

        ]);

        session()->flash("message","formation créer avec succès");
        Flashy::message('formation créer avec succès');

        return redirect(route('formation.index'));




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        $formation=DB::table('formations')->where('id',$id)->first();
        return view('pages.edit_formation',compact('role','formation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(formation $formation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $update=DB::table('formations')
        ->where('id',$id)
        ->update(['diplome'=>$request->diplome,
        'annee'=>$request->annee,
        'lieu'=>$request->lieu,
        'genre'=>$request->genre,
        ]);

        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();

        $datas=DB::table("employers")->get();
        return view("pages.liste",compact("role",'datas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(formation $formation)
    {
        //
    }
}
