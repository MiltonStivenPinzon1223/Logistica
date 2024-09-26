<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use App\Models\User;
//use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    // Mostar pantallas de creación, cambio y restablecimiento de contraseña
    public function create()
    {
        return view('auth.passwords.createPassword');
    }

    public function change()
    {
        //cambiar contraseña con codigo
        return view('auth.verificacionCode');
    }

    public function changes()
    {
        //cambiar contraseña sin codigo
        return view('auth.passwords.changePassword');
    }


    public function reset()
    {
        return view('auth.passwords.reset');
    }

    // Envíar correo de restablecimiento de contraseña
    public function send(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!empty($user)) {
            $user->password = Hash::make($user->document);
            $code = rand(100000,999999);
            $user->code = $code;
            $user->save();
            Mail::to($user->email)->send(new ResetPassword($code));
            $error = "Correo Enviado";
            $message = "Se te envio un correo a la dirección de:".$request->email;
        }else{
            $error = "Correo no encontrado";
            $message = "El correo ".$request->email.", no se encuentra registrado";
        }
        return view('error', compact('error', 'message'));
    }

     // Actualizar la contraseña del usuario
    public function update(Request $request)
    {

        $user = Auth::user();
        $validatedData = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'code' => ['required', 'integer', 'min:100000', 'max:999999'],
        ]);

        // Verifica si el código proporcionado coincide
        if ($user->code == $validatedData['code']) {
            $user->update([
                'password' => Hash::make($validatedData['password']),
                'code' => 0
            ]);
            return redirect()->route('home');
        }else{
            $error = "401";
            $message ="Code do not match";
            return view('error', compact('error', 'message'));
        }
    }
    // Actualiza la contraseña actual del usuario
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'La contraseña actual es incorrecta.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        Auth::logout();

        return redirect()->route('login');
    }

}
