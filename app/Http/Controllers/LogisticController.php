<?php

namespace App\Http\Controllers;

use App\Models\Logistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logistics = Logistic::all();
        $user = Auth::user();
        return view('logistics.index', compact('logistics', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('logistics.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $logistic = new Logistic();
        $logistic->name = $request->name;
        $logistic->description = $request->description;
        $logistic->save();

        return redirect(route('logistics.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $logistic = Logistic::find($id);
        $user = Auth::user();
        return view('logistics.show', compact('logistic', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $logistic = Logistic::find($id);
        $user = Auth::user();
        return view('logistics.edit', compact('logistic', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $logistic = Logistic::find($id);
        $logistic->name = $request->name;
        $logistic->description = $request->description;
        $logistic->save();

        return redirect(route('logistics.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $logistic = Logistic::find($id);
        $logistic->delete();

        return redirect(route('logistics.index'));
    }
}
