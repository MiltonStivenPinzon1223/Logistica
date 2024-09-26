<?php

namespace App\Http\Controllers;

use App\Models\Assistence;
use App\Models\Event;
use App\Models\TypeClothing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
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
        $events = Event::all();
        $user = Auth::user();
        return view('events.index', compact('events', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $types = TypeClothing::all();
        return view('events.create', compact('user', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date|after:today',
            'start' => 'required|date_format:H:i', // Validar que el formato sea de hora (24h)
            'end' => 'required|date_format:H:i|after_or_equal:start', // Validar que sea igual o después de start
            'address' => 'required|string|max:255',
            'quotas' => 'requ       ired|string|max:255',
            'description' => 'required|string|max:255',
            'id_type_clothing' => 'required|string|max:255|exists:type_clothing,id', // Asegúrate de que exista en la tabla correspondiente
        ]);

        $validatedData['id_users'] = Auth::user()->id;
        
        // Crear el evento con los datos validados
        Event::create($validatedData);

        return redirect()->route('events.index')->with('success', 'Evento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::find($id);
        $user = Auth::user();
        return view('events.show', compact('event', 'user'));
    }

    public function postulations($id)
    {
        $assistences= Assistence::where('id', $id)
        ->where('status', '!=', 4)  // Trae todos los que no tengan status = 4
        ->get();
        return $assistences;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $types = TypeClothing::all();
        $event = Event::find($id);
        $user = Auth::user();
        return view('events.edit', compact('event', 'user', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event=Event::find($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date|after:today',
            'start' => 'required|date_format:H:i:s', // Validar que el formato sea de hora (24h)
            'end' => 'required|date_format:H:i:s|after_or_equal:start', // Validar que sea igual o después de start
            'address' => 'required|string|max:255',
            'quotas' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'id_type_clothing' => 'required|string|max:255|exists:type_clothing,id', // Asegúrate de que exista en la tabla correspondiente
        ]);

        $validatedData['id_users'] = Auth::user()->id;
        $event->update($validatedData);

        return redirect(route('events.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        try {
            // Buscar el evento
            $event = Event::find($id);
            // Verificar si el evento existe
            if (!$event) {
                $error = 404;
                $message = "El evento no se encontro";
                return view('errors.encontro', compact('error', 'message'));
            }
            // Intentar eliminar el evento
            $event->delete();
            // Si la eliminación es exitosa
            $message = "Evento eliminado correctamente";
            return view('errors.exitosa', compact('message'));
        } catch (\Illuminate\Database\QueryException $e) {
            // Si hay una violación de la restricción de clave foránea, enviar mensaje de error
            if ($e->getCode() == 23000) {
                $error = 400;
            $message = "Error al intentar eliminar el evento, ya que esta relacionada con otros registros";
            return view('errors.middleware', compact('error', 'message'));
            }
        }
    }
    
}