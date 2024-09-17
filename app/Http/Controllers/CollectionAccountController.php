<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CollectionAccount;

class CollectionAccountController extends Controller
{
    public function index()
    {
        $collectionAccounts = CollectionAccount::all();
        return view('collectionaccounts.index', compact('collectionAccounts'));
    }

    public function create()
    {
        return view('collectionaccounts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'price' => 'required',
            'url' => 'required|unique:collection_accounts,url',
            'status' => 'required|string|max:255',
            'id_assistences' => 'nullable|numeric',
        ]);

        CollectionAccount::create($validatedData);

        return redirect()->route('collectionaccounts.index')
                        ->with('success', 'Collection account created successfully.');
    }

    public function show($id)
    {
        $collectionAccount = CollectionAccount::findOrFail($id);
        return view('collectionaccounts.show', compact('collectionAccount'));
    }

    public function edit($id)
    {
        $collectionAccount = CollectionAccount::findOrFail($id);
        return view('collectionaccounts.edit', compact('collectionAccount'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'price' => 'required',
            'url' => 'required|unique:collection_accounts,url',
            'status' => 'required|string|max:255',
            'id_assistences' => 'nullable|numeric',
        ]);

        $collectionAccount = CollectionAccount::findOrFail($id);
        $collectionAccount->update($validatedData);

        return redirect()->route('collectionaccounts.index')
                        ->with('success', 'Collection account updated successfully.');
    }

    public function destroy($id)
    {
        $collectionAccount = CollectionAccount::findOrFail($id);
        $collectionAccount->delete();

        return redirect()->route('collectionaccounts.index')
                        ->with('success', 'Collection account deleted successfully.');
    }
}
