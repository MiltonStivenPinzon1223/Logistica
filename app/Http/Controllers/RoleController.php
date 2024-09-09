<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $roles = Role::all();
        return view('roles.index', compact('roles', 'user'));
    }
}
