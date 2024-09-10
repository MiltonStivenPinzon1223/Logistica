<?php

namespace App\Http\Controllers;

use App\Models\TypeClothing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeClothingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = TypeClothing::all();
        $user = Auth::user();
        return view('typeClothing.index', compact('types', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('typeClothing.create', compact('user'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
