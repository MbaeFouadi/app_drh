<?php

namespace App\Http\Controllers;

use App\Models\composante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;


class composantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $composantes = composante::all();
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        return view('pages.composante',compact('composantes','role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.composante');
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
            'nom' => 'required|max:255|min:3|unique:composantes,nom',
            'code' => 'required|min:2|max:10',
        ]);
        /*$nbrComp = composantes::where('nom', nom)->count();
        $nbrCode = composantes::where('code_des', code)->count();

        if($nbrComp==1){
            return 'Ce code design existe';
        }elseif ($nbrCode==1){
            return 'Ce code design est utilisé';
        }else{*/
            composante::create(['nom'=>$request->nom,'code_des'=>$request->code]);

            Flashy::message('Composante créer avec succès');
            //Flashy::message('Insertion reuissi avec succès');
            return redirect(route('composante.index'));
        //}
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

    public function update(Request $request)
    {
        $request->validate([
            'nom_composante' => 'required|max:255|min:3',
            'code_composante' => 'required|min:2|max:10',
            'id' => 'required',
        ]);
        $id=$request->id;
        $nom = $request->nom_composante;
        $code = $request->code_composante;
        DB::table('composantes')
            ->where('id', $id)
            ->update(['nom' => $nom,'code_des' => $code]);
        return redirect()->route('composante.index');
    }

    
    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::table('composantes')->delete($id);
        return redirect()->route('composante.index');
    }

    public function composantes()
    {
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        $composantes = composante::all();
        return view("pages.composantes",compact('role','composantes'));
    }

    public function getService(Request $request)
    {
        $services = DB::table('composantes')
        ->join("services", "composantes.id", "=", "services.composante_id")
        ->where("composante_id", $request->composantes_id)
        ->select("services.nom as service", "services.id as services_id", "composantes.*")
        ->orderByDesc("service")
        ->pluck("service", "services_id");
        return response()->json($services);
    }

    public function liste_composantes( Request $request)
    {
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        $employers=DB::table("employers")
        ->join("affecation_employers","employers.id","affecation_employers.employer_id")
        ->join("affectations","affecation_employers.affectation_id","affectations.id")
        ->join("composantes","affectations.composante_id","composantes.id")
        ->where("composante_id",$request->composantes_id)
        ->where("service_id",$request->services_id)
        ->select("employers.*","affecation_employers.*","affectations.*","composantes.nom as composante")
        ->orderBy('employers.nom','asc')
        ->get();

        return view("pages.listes_composantes",compact('employers','role'));

    }
}
