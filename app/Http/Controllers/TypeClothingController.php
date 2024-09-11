<?php

namespace App\Http\Controllers;

use App\Models\TypeClothing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeClothingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeClothings = TypeClothing::all();
        $user = Auth::user();
        return view('typeClothings.index', compact('typeClothings', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('typeClothings.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $typeClothing = new TypeClothing();
        $typeClothing->name = $request->name;
        $typeClothing->description = $request->description;
        $typeClothing->save();

        return redirect(route('typeClothings.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $typeClothing = TypeClothing::find($id);
        $user = Auth::user();
        return view('typeClothings.show', compact('typeClothing', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $typeClothing = TypeClothing::find($id);
        $user = Auth::user();
        return view('typeClothings.edit', compact('typeClothing', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $typeClothing = TypeClothing::find($id);
        $typeClothing->name = $request->name;
        $typeClothing->description = $request->description;
        $typeClothing->save();

        return redirect(route('typeClothings.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $typeClothing = TypeClothing::find($id);
        $typeClothing->delete();

        return redirect(route('typeClothings.index'));
    }
}
