<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Logistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
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
        $user = Auth::user();
        if ($user->id_roles == 1) {
            $logistic = Logistic::where('id_users', $user->id)->first();
            $certificates = Certificate::where('id_logistics',$logistic->id)->get();
        }else
        {
            $certificates = Certificate::all();

        }
        return view('certificates.index', compact('certificates', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $types = Certificate::all();
        return view('certificates.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'id_type_certificate' => 'required|integer|exists:type_certificates,id', // Valida que exista en la tabla de certificates
            'id_logistics' => 'required|integer|exists:logistics,id', // Valida que exista en la tabla de logistics
        ]);

        $validatedData['id_users'] = Auth::user()->id;
        
        // Crear el evento con los datos validados
        certificate::create($validatedData);

        return redirect()->route('certificates.index')->with('success', 'Evento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $certificate = Certificate::find($id);
        $user = Auth::user();
        return view('certificates.show', compact('certificate', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $certificate = Certificate::find($id);
        $user = Auth::user();
        return view('certificates.edit', compact('certificate', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $certificate = Certificate::find($id);
        $certificate->name = $request->name;
        $certificate->save();

        return redirect(route('certificates.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Buscar el Certificado
            $certificate = Certificate::find($id);
            // Verificar si el Certificado existe
            if (!$certificate) {
                $error = 404;
                $message = "El Certificado no se encontro";
                return view('errors.encontro', compact('error', 'message'));
            }
            // Intentar eliminar el Certificado
            $certificate->delete();
            // Si la eliminación es exitosa
            $message = "Certificado eliminado correctamente";
            return view('errors.exitosa', compact('message'));
        } catch (\Illuminate\Database\QueryException $e) {
            // Si hay una violación de la restricción de clave foránea, enviar mensaje de error
            if ($e->getCode() == 23000) {
                $error = 400;
            $message = "Error al intentar eliminar el Certificado, ya que esta relacionada con otros registros";
            return view('errors.middleware', compact('error', 'message'));
            }
        }
    }
}
