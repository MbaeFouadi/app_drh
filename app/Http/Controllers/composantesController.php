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
}
