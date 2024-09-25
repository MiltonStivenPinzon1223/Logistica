<?php
namespace App\Http\Controllers;

use App\Models\Solicitude;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudeController extends Controller
{
    public function index()
    {
        $solicitudes = Solicitude::paginate(10);
        return view('solicitudes.index', compact('solicitudes'));
    }

    public function create()
    {
        return view('solicitudes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string|max:1000',
            'status' => 'required|string|max:255',
        ]);

        Solicitude::create([
            'description' => $validatedData['description'],
            'status' => 1,
            'id_users' => Auth::id()
        ]);

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud creada exitosamente.');
    }

    public function show(Solicitude $solicitude)
    {
        return view('solicitudes.show', compact('solicitude'));
    }

    public function edit(Solicitude $solicitude)
    {
        return view('solicitudes.edit', compact('solicitude'));
    }

    public function update(Request $request, Solicitude $solicitude)
    {
        $validatedData = $request->validate([
            'description' => 'required|string|max:1000',
            'status' => 'required|string|max:255',
            'id_users' => 'required|integer|exists:users,id',
        ]);

        $solicitude->update($validatedData);

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud actualizada exitosamente.');
    }
}
