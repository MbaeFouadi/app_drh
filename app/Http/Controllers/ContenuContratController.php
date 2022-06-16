<?php

namespace App\Http\Controllers;

use App\Models\contenu_contrat;
use App\Http\Requests\Storecontenu_contratRequest;
use App\Http\Requests\Updatecontenu_contratRequest;

class ContenuContratController extends Controller
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
     * @param  \App\Http\Requests\Storecontenu_contratRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storecontenu_contratRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contenu_contrat  $contenu_contrat
     * @return \Illuminate\Http\Response
     */
    public function show(contenu_contrat $contenu_contrat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contenu_contrat  $contenu_contrat
     * @return \Illuminate\Http\Response
     */
    public function edit(contenu_contrat $contenu_contrat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatecontenu_contratRequest  $request
     * @param  \App\Models\contenu_contrat  $contenu_contrat
     * @return \Illuminate\Http\Response
     */
    public function update(Updatecontenu_contratRequest $request, contenu_contrat $contenu_contrat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contenu_contrat  $contenu_contrat
     * @return \Illuminate\Http\Response
     */
    public function destroy(contenu_contrat $contenu_contrat)
    {
        //
    }
}
