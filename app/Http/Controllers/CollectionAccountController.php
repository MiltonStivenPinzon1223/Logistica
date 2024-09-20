<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CollectionAccount;
use Illuminate\Support\Facades\Auth;

class CollectionAccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $collectionAccounts = CollectionAccount::all();
        return view('collectionsAccounts.index', compact('user', 'collectionAccounts'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('collectionsAccounts.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'price' => 'required',
            'url' => 'required|unique:collection_accounts,url',
            'status' => 'required|string|max:255',
            'id_assistences' => 'nullable|numeric',
        ]);

        CollectionAccount::create($validatedData);

        return redirect()->route('collectionsAccounts.index')
                        ->with('success', 'Collection account created successfully.');
    }

    public function show($id)
    {
        $user = Auth::user();
        $collectionAccount = CollectionAccount::findOrFail($id);
        return view('collectionsAccounts.show', compact('user', 'collectionAccount'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $collectionAccount = CollectionAccount::findOrFail($id);
        return view('collectionsAccounts.edit', compact('user', 'collectionAccount'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'price' => 'required',
            'url' => 'required|unique:collection_accounts,url',
            'status' => 'required|string|max:255',
            'id_assistences' => 'nullable|numeric',
        ]);

        $collectionAccount = CollectionAccount::findOrFail($id);
        $collectionAccount->update($validatedData);

        return redirect()->route('collectionsAccounts.index')
                        ->with('success', 'Collection account updated successfully.');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $collectionAccount = CollectionAccount::findOrFail($id);
        $collectionAccount->delete();

        return redirect()->route('collectionsAccounts.index')
                        ->with('success', 'Collection account deleted successfully.');
    }
}
