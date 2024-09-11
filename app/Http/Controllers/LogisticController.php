<?php

namespace App\Http\Controllers;

use App\Models\Logistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogisticController extends Controller
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
        $response = Controller::authRoles(2);
        if ($response) {return $response;}
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
        $user = Auth::user();
        $logistic = new Logistic();
        $logistic->celular = $request->celular;
        $logistic->description = $request->description;
        $logistic->id_users = $user->id;
        $logistic->save();

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $response = Controller::authRoles(2);
        if ($response) {return $response;}
        $logistic = Logistic::find($id);
        $user = Auth::user();
        return view('logistics.show', compact('logistic', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = Controller::authRoles(2);
        if ($response) {return $response;}
        $logistic = Logistic::find($id);
        $user = Auth::user();
        return view('logistics.edit', compact('logistic', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Controller::authRoles(2);
        if ($response) {return $response;}
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
        $response = Controller::authRoles(2);
        if ($response) {return $response;}
        $logistic = Logistic::find($id);
        $logistic->delete();
        return redirect(route('logistics.index'));
    }
}
