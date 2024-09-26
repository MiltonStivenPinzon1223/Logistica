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
        if ($request->code == $user->code) {
            $user = Auth::user();
            $user->code = 0;
            $user->save();
            $logistic = new Logistic();
            $logistic->celular = $request->celular;
            $logistic->description = $request->description;
            $logistic->id_users = $user->id;
            $logistic->save();

            return redirect(route('home'));
        }else{
            $error = 400;
            $message = "Codigo de  verificacion incorrecto.";
            return view('errors.middleware', compact('error', 'message'));
        }
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
        try {
            // Buscar el logistico
            $logistic = Logistic::find($id);
            // Verificar si el logistico existe
            if (!$logistic) {
                $error = 404;
                $message = "El logistico no se encontro";
                return view('errors.encontro', compact('error', 'message'));
            }
            // Intentar eliminar el logistico
            $logistic->delete();
            // Si la eliminación es exitosa
            $message = "logistico eliminado correctamente";
            return view('errors.exitosa', compact('message'));
        } catch (\Illuminate\Database\QueryException $e) {
            // Si hay una violación de la restricción de clave foránea, enviar mensaje de error
            if ($e->getCode() == 23000) {
                $error = 400;
            $message = "Error al intentar eliminar el logistico, ya que esta relacionada con otros registros";
            return view('errors.middleware', compact('error', 'message'));
            }
        }
    }
}
