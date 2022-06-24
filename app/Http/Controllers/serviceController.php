<?php

namespace App\Http\Controllers;
use App\Models\service;
use App\Models\services;
use App\Models\composante;
use App\Models\composantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;


class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $services = service::all();


        $services=DB::table('services')
        ->join('composantes','services.composante_id','=','composantes.id')
        ->select('services.id','services.nom','services.code_des','services.composante_id','composantes.code_des as composante')
        // ->distinct()
        ->get();
        $composantes = composante::all();
        $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*', 'roles.*')
            ->where("role_user.user_id", Auth::user()->id)->first();
        return view('pages.service', compact('services', 'composantes', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*', 'roles.*')
            ->where("role_user.user_id", Auth::user()->id)->first();
        return view('pages.service', compact('role'));
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
            'nom' => 'required|max:255|min:1',
            'code' => 'required|min:1|max:255',
            'composante' => 'required',
        ]);

        $service = DB::table('services')->where('nom', $request->nom)->where('composante_id', $request->composante)->get();

        if ($service->count() == 1) {

            $services = service::all();
            $composantes = composante::all();
            $msg = "Cette service existe dejà";
            $role = DB::table('role_user')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->select('role_user.*', 'roles.*')
                ->where("role_user.user_id", Auth::user()->id)->first();
            return  view('pages.service', compact('services', 'composantes', 'msg','role'));
        } else {
            $role = DB::table('role_user')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->select('role_user.*', 'roles.*')
                ->where("role_user.user_id", Auth::user()->id)->first();
            $services = service::all();
            $composantes = composante::all();
            service::create(['nom' => $request->nom, 'code_des' => $request->code, 'composante_id' => $request->composante]);
            Flashy::message('Service créer avec succès');
            return  view('pages.service', compact('services', 'composantes','role'));
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
    public function getServiceByComposante($composante_id)
    {
        if ($composante_id == 'all') {
            return $services=DB::table('services')
            ->join('composantes','services.composante_id','=','composantes.id')
            ->select('services.id','services.nom','services.code_des','services.composante_id','composantes.code_des as composante')
            // ->select('services.id','services.nom','services.code_des','services.composante_id')
            ->get();
            // return Service::all();
        }
        return $services=DB::table('services')
            ->join('composantes','services.composante_id','=','composantes.id')
            ->select('services.id','services.nom','services.code_des','services.composante_id','composantes.code_des as composante')
            // ->select('services.id','services.nom','services.code_des','services.composante_id')
            ->where('composante_id',$composante_id)
            ->get();
        // return Service::where('composante_id', $composante_id)->get();
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
    public function update(Request $request)
    {
        $request->validate([
            'nom_service' => 'required|max:255|min:3',
            'code_service' => 'required|min:2|max:4',
            'composante_du_service' => 'required',
            'id' => 'required',
        ]);
        $id = $request->id;
        $nom = $request->nom_service;
        $code = $request->code_service;
        $composante = $request->composante_du_service;
        DB::table('services')
            ->where('id', $id)
            ->update(['nom' => $nom, 'code_des' => $code, 'composante_id' => $composante]);
        return redirect(route('service.index'));
    }


    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::table('services')->delete($id);
        return redirect()->route('service.index');
    }
}
