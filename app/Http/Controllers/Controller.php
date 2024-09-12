<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public static function authRoles($rol){
        $user = Auth::user();
        if ($user->id_roles != $rol) {
            $error = 403;
            $message = "No posses los permisos necesarios para esta ruta.";
            return view('errors.middleware', compact('error', 'message'));
        }
    }
}
