<?php
namespace App\Http\Controllers;

use App\Models\Solicitude;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $solicitudes = Solicitude::where('status', '!=', '1')->paginate(10);
        return view('solicitudes.index', compact('user','solicitudes'));
    }

    public function historial()
    {
        $user = Auth::user();
        $solicitudes = Solicitude::paginate(10);
        return view('solicitudes.historial', compact('user','solicitudes'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('solicitudes.create', compact('user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string|max:1000',
            'status' => 'required|string|max:255',
        ]);

        Solicitude::create([
            'description' => $validatedData['description'],
            'status' => 0,
            'id_users' => Auth::id()
        ]);

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud creada exitosamente.');
    }

    public function show(Solicitude $solicitude)
    {
        $user = Auth::user();
        return view('solicitudes.show', compact('user','solicitude'));
    }

    public function edit(Solicitude $solicitude)
    {
        $user = Auth::user();
        return view('solicitudes.edit', compact('user','solicitude'));
    }

    public function destroy($id)
    {
        $solicitude = Solicitude::find($id);
        $newStatus = ($solicitude->status == 1) ? 0 : 1;
        $solicitude->status = $newStatus;
        $solicitude->save();
        return redirect()->route('solicitudes.index')->with('success', 'Solicitud actualizada exitosamente.');
    }
}
