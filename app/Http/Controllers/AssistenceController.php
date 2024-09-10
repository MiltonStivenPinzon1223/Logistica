<?php

namespace App\Http\Controllers;

use App\Models\Assistence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssistenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assistences = Assistence::all();
        $user = Auth::user();
        return view('assistences.index', compact('assistences', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('assistences.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $assistence = new Assistence();
        $assistence->name = $request->name;
        $assistence->save();

        return redirect(route('assistences.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $assistence = Assistence::find($id);
        $user = Auth::user();
        return view('assistences.show', compact('assistence', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $assistence = Assistence::find($id);
        $user = Auth::user();
        return view('assistences.edit', compact('assistence', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $assistence = Assistence::find($id);
        $assistence->name = $request->name;
        $assistence->save();

        return redirect(route('assistences.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assistence = Assistence::find($id);
        $assistence->delete();

        return redirect(route('assistences.index'));
    }
}
