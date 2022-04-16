<?php

namespace App\Http\Controllers;
use App\Models\corps;
use App\Models\annees;
use App\Models\classes;
use App\Models\indices;
use App\Models\echelons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\classes_corps_echelons_indices_periode;

class affectationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classes=classes::all();
        $corps=corps::all();
        $indices=indices::all();
        $echelons=echelons::all();
        $annees=annees::all();
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        // dd($corps);

        return view('pages.affectations',compact('corps','classes','indices','echelons','annees','role'));


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
            'classes' => 'required',
            'corps' => 'required',
            'echelons'=>'required',
            'indices'=>'required',
            'periodes'=>'required',
        ]);
        $classes = DB::table('classes_corps_echelons_indices_periodes')
        ->where("classes_corps_echelons_indices_periodes.periodes_id",$request->periodes)
        ->Where("classes_corps_echelons_indices_periodes.corps_id",$request->corps)
        ->Where("classes_corps_echelons_indices_periodes.classes_id",$request->classes)
        ->Where("classes_corps_echelons_indices_periodes.echelons_id",$request->echelons)
        ->Where("classes_corps_echelons_indices_periodes.indices_id",$request->indices)
        ->get();

        if($classes->count()==1)
        {
            $messages="Vous avez dejà enregistré cette affectation";

            // return view('affectations.index',compact('msg'));
            // return view('pages.affectations',compact('messages'));
            $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*','roles.*')
            ->where("role_user.user_id",Auth::user()->id)->first();
            $classes=classes::all();
            $corps=corps::all();
            $indices=indices::all();
            $echelons=echelons::all();
            $annees=annees::all();
            // dd($corps);

            return view('pages.affectations',compact('corps','classes','indices','echelons','annees','messages','role'));

        }
        else
        {
            classes_corps_echelons_indices_periode::create(['classes_id'=>$request->classes,'corps_id'=>$request->corps,'echelons_id'=>$request->echelons,'indices_id'=>$request->indices,'periodes_id'=>$request->periodes]);
            // session()->flash('message','Evenement creer avec succes');

            // Flashy::message('Insertion reuissi avec succès');
            return redirect(route('affectations.index'));
        }

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function corps(Request $request)
    {
        $request->validate([
            'corps_in' =>'unique:corps,nom',

        ]);
        corps::create(['nom'=>$request->corps_in]);
        return redirect(route('affectations.index'));

    }

    public function classes(Request $request)
    {
        $request->validate([
            'classes_in' =>'unique:classes,nom',

        ]);
        classes::create(['nom'=>$request->classes_in]);
        return redirect(route('affectations.index'));
    }

    public function echelons(Request $request)
    {
        $request->validate([
            'echelons_in' =>'unique:echelons,nom',

        ]);
        echelons::create(['nom'=>$request->echelons_in]);
        return redirect(route('affectations.index'));
    }

    public function indices(Request $request)
    {
        $request->validate([
            'indices_in' =>'unique:indices,nom',

        ]);
        indices::create(['nom'=>$request->indices_in]);
        return redirect(route('affectations.index'));

    }

    // public function periodes()
    // {

    // }
}
