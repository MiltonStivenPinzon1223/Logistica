<?php

namespace App\Http\Controllers;

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
            'quotas' => 'required|string|max:255',
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::find($id);
        $user = Auth::user();
        return view('events.edit', compact('event', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::find($id);
        $event->name = $request->name;
        $event->date = $request->date;
        $event->location = $request->location;
        $event->save();

        return redirect(route('events.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect(route('events.index'));
    }
}
