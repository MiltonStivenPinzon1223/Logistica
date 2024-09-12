<?php

namespace App\Http\Controllers;

use App\Models\CollectionAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionAccountController extends Controller
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
        $collectionAccounts = CollectionAccount::all();
        $user = Auth::user();
        return view('collectionsAccounts.index', compact('collectionAccounts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('collectionAccounts.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $collectionAccount = new CollectionAccount();
        $collectionAccount->name = $request->name;
        $collectionAccount->save();

        return redirect(route('collectionAccounts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $collectionAccount = CollectionAccount::find($id);
        $user = Auth::user();
        return view('collectionAccounts.show', compact('collectionAccount', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $collectionAccount = CollectionAccount::find($id);
        $user = Auth::user();
        return view('collectionAccounts.edit', compact('collectionAccount', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $collectionAccount = CollectionAccount::find($id);
        $collectionAccount->name = $request->name;
        $collectionAccount->save();

        return redirect(route('collectionAccounts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $collectionAccount = CollectionAccount::find($id);
        $collectionAccount->delete();

        return redirect(route('collectionAccounts.index'));
    }
}
