<?php

namespace App\Http\Controllers;

use App\Models\employer;
use App\Models\employer_formation;
use App\Models\statut;
use App\Models\formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;


class StatutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //

        $request->validate([
            'date_re'=>'required',
            'annees'=>'required',
            'date_dec'=>'required',
            'note'=>'required',
            'corps'=>'required',
            'echelons'=>'required',
            'classes'=>'required',
            'indices'=>'required',
            'ministere'=>'required',

        ]);

        statut::create([

        'date_re'=>$request->date_re,
        'date_dec'=>$request->date_dec,
        'note'=>$request->note,
        'corps_id'=>$request->corps,
        'echelons_id'=>$request->echelons,
        'classes_id'=>$request->classes,
        'indices_id'=>$request->indices,
        'ministere'=>$request->ministere,
        'user_id'=>Auth::user()->id

        ]);
        $statut=statut::where('user_id',Auth::user()->id)->orderByDesc('id')->first();
        $employer_formation=employer_formation::where('user_id',Auth::user()->id)->orderByDesc('id')->first();
        $employers=employer::where('user_id',Auth::user()->id)->orderByDesc('id')->first();

        //  $upd=DB::table('employers')
        // ->where('user_id',Auth::user()->id)
        // ->update(['statut_id',$statut->id]);

        $update = DB::table('employers')
        ->where('id',$employers->id)
        ->update(['statut_id' => $statut->id]);


        session()->flash("message","Statut initial créer avec succès");
        Flashy::message('Statut initial créer avec succès');




    return redirect(route('avancement.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\statut  $statut
     * @return \Illuminate\Http\Response
     */
    public function show(statut $statut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\statut  $statut
     * @return \Illuminate\Http\Response
     */
    public function edit(statut $statut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\statut  $statut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update=DB::table('statuts')
        ->where('id',$id)
        ->update([ 'date_re'=>$request->date_re,
        'date_dec'=>$request->date_dec,
        'note'=>$request->note,
        'corps_id'=>$request->corps,
        'echelons_id'=>$request->echelons,
        'classes_id'=>$request->classes,
        'indices_id'=>$request->indices,
        'ministere'=>$request->ministere,
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
     * @param  \App\Models\statut  $statut
     * @return \Illuminate\Http\Response
     */
    public function destroy(statut $statut)
    {
        //
    }
}
