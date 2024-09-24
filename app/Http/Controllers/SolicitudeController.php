<?php

namespace App\Http\Controllers;

use App\Models\Solicitude;
use Illuminate\Http\Request;

class SolicitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicitudes = Solicitude::all();
        return $solicitudes;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Solicitude $solicitude)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solicitude $solicitude)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solicitude $solicitude)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solicitude $solicitude)
    {
        //
    }
}
