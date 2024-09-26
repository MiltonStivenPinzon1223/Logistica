<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        $users = User::all();
        $user = Auth::user();
        return view('users.index', compact('users', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authUser = Auth::user();
        return view('users.create', compact('authUser'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        $authUser = Auth::user();
        return view('users.show', compact('user', 'authUser'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $authUser = Auth::user();
        return view('users.edit', compact('user', 'authUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = user::find($id);
        $newStatus = ($user->status == 0) ? 1 : 0;
        $user->status = $newStatus;
        $user->save();

        return redirect(route('users.index'));
    }
}
