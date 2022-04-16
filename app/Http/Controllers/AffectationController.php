<?php

namespace App\Http\Controllers;

use App\Models\annees;
use App\Models\employer;
use App\Models\composante;
use App\Models\affectation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\affecation_employer;
use Illuminate\Support\Facades\Auth;

class AffectationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employer=employer::where('user_id',Auth::user()->id)->orderBydesc('id')->first();
        $composantes=composante::all();
        $annees=annees::all();
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        return view('pages.affectation',compact('composantes','employer','annees','role'));

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
            'numero_post'=>'required',
            'position'=>'required',
            'composantes'=>'required',
            'services'=>'required',
            'fonctions'=>'required',



        ]);

        $fonctions=DB::table('fonctions')
        ->where('annee_id',$request->annees)
        ->where('id',$request->fonctions)
        ->first();
        $nbre=$fonctions->nombre;
        $affectations=DB::table('affectations')->where('fonction_id',$request->fonctions)->get();
        if($affectations->count() < $nbre)
        {
            affectation::create([
                'numero_post'=>$request->numero_post,
                'position'=>$request->position,
                'composante_id'=>$request->composantes,
                'service_id'=>$request->services,
                'fonction_id'=>$request->fonctions,
                'user_id'=>Auth::user()->id
                ]);

                $affectation=affectation::where('user_id',Auth::user()->id)->orderByDesc('id')->first();
                    affecation_employer::create([
                    'employer_id'=>$request->employer_id,
                    'affectation_id'=>$affectation->id,
                    'user_id'=>Auth::user()->id
                ]);
                $role = DB::table('role_user')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->select('role_user.*','roles.*')
                ->where("role_user.user_id",Auth::user()->id)->first();
                return redirect(route('affectation.index',compact('role')));
        }
        else
        {
            $erreur="Vous avez atteint le nombre maximale de ce poste";
            $employer=employer::where('user_id',Auth::user()->id)->orderBydesc('id')->first();
            $annees=annees::where("id",);
              $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*','roles.*')
            ->where("role_user.user_id",Auth::user()->id)->first();
            return view('pages.affectation',compact('composantes','employer','annees','erreur','role'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\affectation  $affectation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $composantes=DB::table('composantes')->get();
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        $affectation=DB::table('affectations')
        ->join('composantes','affectations.composante_id','=','composantes.id')
        ->join('services','affectations.service_id','=','services.id')
        ->join('fonctions','affectations.fonction_id','=','fonctions.id')
        ->join('annees','fonctions.annee_id','=','annees.id')
        ->select('affectations.*','composantes.nom as composante','composantes.id as composantes_id','services.nom as service','services.id as services_id','fonctions.nom as fonction','fonctions.id as fonctions_id','annees.annee as annee')
        ->where('affectations.id',$id)->first();

        $annees=DB::table('annees')->get();
        return view('pages.edit_affectation',compact('role','affectation','annees','composantes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\affectation  $affectation
     * @return \Illuminate\Http\Response
     */
    public function edit(affectation $affectation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\affectation  $affectation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $update=DB::table('affectations')
        ->where('id',$id)
        ->update([ 'numero_post'=>$request->numero_post,
        'position'=>$request->position,
        'composante_id'=>$request->composantes,
        'service_id'=>$request->services,
        'fonction_id'=>$request->fonctions,
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
     * @param  \App\Models\affectation  $affectation
     * @return \Illuminate\Http\Response
     */
    public function destroy(affectation $affectation)
    {
        //
    }


    public function getServices(Request $request)
    {
    $services = DB::table('services')
            ->where("composante_id",$request->composantes_id)
            ->pluck("nom","id");
    return response()->json($services);
    }

    public function getFonctions(Request $request)
    {


        $fonction = DB::table('fonctions')
            ->Where("service_id",$request->services_id)
            ->pluck("nom","id");
         return response()->json($fonction);
    }

    public function getAnnees(Request $request)
    {

        $fonctions=DB::table("fonctions")->where("id",$request->fonction_id)->first();
        $annees = DB::table('annees')
            ->Where("id",$fonctions->annee_id)
            ->pluck("annee","id");
         return response()->json($annees);
    }


}
