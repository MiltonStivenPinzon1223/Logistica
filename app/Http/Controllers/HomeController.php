<?php

namespace App\Http\Controllers;

use App\Models\Assistence;
use App\Models\Event;
use App\Models\Logistic;
use App\Models\Solicitude;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->id_roles == 1) {
            $logistic = Logistic::where('id_users', '=', $user->id)->first();
            $assistedEventIds = Assistence::where('id_logistics','=', $logistic->id)->get()->pluck('id_events');
            // Obtener eventos futuros donde el usuario no se ha postulado
            $events = Event::where('date', '>', date('Y-m-d'))
                            ->whereNotIn('id', $assistedEventIds)
                            ->get();
            return view('home', compact('user', 'events'));
        }elseif ($user->id_roles == 2) {
            # code...
        }elseif ($user->id_roles == 3) {
            return redirect()->route('solicitudes.index');
        }
    }

    public function profile(){
        $user = Auth::user();
        $logistic = Logistic::where('id_users', $user->id)->first();
        return view('auth.profile', compact('user','logistic'));
    }

    public function profileEdit(){
        $user = Auth::user();
        $logistic = Logistic::where('id_users', $user->id)->first();
        return view('auth.edit', compact('user', 'logistic'));
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();
        $logistic = Logistic::where('id_users', $user->id)->first();
        // Validar los datos del usuario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'celular' => 'required|integer',
            'document' => [
                'required',
                'integer',
                Rule::unique('users')->ignore($user->id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ]
        ]);

        // Actualizar los datos del usuario
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'document' => $validatedData['document'],
            'password' => isset($validatedData['password']) ? Hash::make($validatedData['password']) : $user->password,
        ]);
        $logistic->update([
            'celular' => $validatedData['celular'],
            'description' => $validatedData['description']
        ]);

        // Retornar respuesta o redirección
        return redirect()->route('profile')->with('success', 'Datos personales actualizados exitosamente.');
    }
}
