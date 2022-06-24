<?php

namespace App\Http\Controllers;

use App\Models\annees;
use App\Models\service;
use App\Models\fonction;
use App\Models\services;
use App\Models\categorie;
use App\Models\fonctions;
use App\Models\categories;
use App\Models\composante;
use App\Models\composantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;


class fonctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $fonctions = fonction::all();
        $fonctions = DB::table('fonctions')
            ->join('services', 'fonctions.service_id', '=', 'services.id')
            ->select('fonctions.*', 'services.code_des as service')
            // ->select('services.id','services.nom','services.code_des','services.composante_id')
            ->get();
        // return Fonction::all();

        $composantes = composante::all();
        // $services = service::all();
        $services = DB::table('services')
            ->join('composantes', 'services.composante_id', '=', 'composantes.id')
            ->select('services.id', 'services.nom', 'services.code_des', 'services.composante_id', 'composantes.code_des as composante')
            // ->select('services.id','services.nom','services.code_des','services.composante_id')
            ->get();
        $categories = categorie::all();
        $annees = annees::all();
        $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*', 'roles.*')
            ->where("role_user.user_id", Auth::user()->id)->first();
        return view('pages.fonction', compact('fonctions', 'composantes', 'services', 'categories', 'annees', 'role'));
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
            'fonction' => 'required|max:255|min:3',
            'service' => 'required',
            'nombre' => 'required|max:10',
            'categorie' => 'required',
            'annee' => 'required',
        ]);

        $fonction = DB::table('fonctions')->where('nom', $request->fonction)->where('nombre', $request->nombre)->where('service_id', $request->service)->where('category_id', $request->categorie)->where('annee_id', $request->annee)->get();

        if ($fonction->count() == 1) {
            $role = DB::table('role_user')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->select('role_user.*', 'roles.*')
                ->where("role_user.user_id", Auth::user()->id)->first();
            $message = "Cette fonction existe deja dans ce service";
            $fonctions = fonction::all();
            $composantes = composante::all();
            $services = service::all();
            $categories = categorie::all();
            $annees = annees::all();
            return view('pages.fonction', compact('fonctions', 'composantes', 'services', 'categories', 'annees', 'message', 'role'));
        } else {
            $role = DB::table('role_user')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->select('role_user.*', 'roles.*')
                ->where("role_user.user_id", Auth::user()->id)->first();
            $fonctions = fonction::all();
            $composantes = composante::all();
            // $services = service::all();
            $services = DB::table('services')
            ->join('composantes', 'services.composante_id', '=', 'composantes.id')
            ->select('services.id', 'services.nom', 'services.code_des', 'services.composante_id', 'composantes.code_des as composante')
            // ->select('services.id','services.nom','services.code_des','services.composante_id')
            ->get();
            $categories = categorie::all();
            $annees = annees::all();
            fonction::create(['nom' => $request->fonction, 'nombre' => $request->nombre, 'service_id' => $request->service, 'category_id' => $request->categorie, 'annee_id' => $request->annee]);
            Flashy::message('Fonction créer avec succès');
            return view('pages.fonction', compact('fonctions', 'composantes', 'services', 'categories', 'annees', 'role'));
        }
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

    public function getFonctionByService($service_id)
    {
        if ($service_id == 'all') {
            return  $fonction = DB::table('fonctions')
                ->join('services', 'fonctions.service_id', '=', 'services.id')
                ->select('fonctions.*', 'services.code_des as service', 'services.id')
                // ->select('services.id','services.nom','services.code_des','services.composante_id')
                ->get();
            // return Fonction::all();
        }

        return $fonction = DB::table('fonctions')
            ->join('services', 'fonctions.service_id', '=', 'services.id')
            ->select('fonctions.*', 'services.code_des as service','services.id as service_id')
            // ->select('services.id','services.nom','services.code_des','services.composante_id')
            ->where('service_id', $service_id)
            ->get();
        // return Fonction::where('service_id', $service_id)->get();
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

    public function update(Request $request)
    {
        dd($request);
        $request->validate([
            'nom_fonction' => 'required|max:255|min:3',
            'service_fonction' => 'required',
            'nombre_fonction' => 'required|max:10',
            'category_fonction' => 'required',
            'annee_fonction' => 'required',
        ]);

        $id = $request->id;
        $nom = $request->nom_fonction;
        $nombre = $request->nombre_fonction;
        $service = $request->service_fonction;
        $category = $request->category_fonction;
        $annee = $request->annee_fonction;
        DB::table('fonctions')
            ->where('id', $id)
            ->update([
                'nom' => $nom,
                'nombre' => $nombre,
                'service_id' => $service,
                'category_id' => $category,
                'annee_id' => $annee
            ]);
        return redirect(route('fonction.index'));
    }


    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::table('fonctions')->delete($id);
        return redirect()->route('fonction.index');
    }
}
