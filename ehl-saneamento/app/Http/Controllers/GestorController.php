<?php

namespace App\Http\Controllers;

use App\Models\Gestor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGestorRequest;
use App\Http\Requests\UpdateGestorRequest;

class GestorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('gestores.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGestorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Gestor $gestor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gestor $gestor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGestorRequest $request, Gestor $gestor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gestor $gestor)
    {
        //
    }
}
