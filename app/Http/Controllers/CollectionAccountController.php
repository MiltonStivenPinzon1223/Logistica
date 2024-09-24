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
        try {
            // Buscar el cuenta de cobro
            $collectionAccount = CollectionAccount::find($id);
            // Verificar si el cuenta de cobro existe
            if (!$collectionAccount) {
                $error = 404;
                $message = "La cuenta de cobro no se encontro";
                return view('errors.encontro', compact('error', 'message'));
            }
            // Intentar eliminar el cuenta de cobro
            $collectionAccount->delete();
            // Si la eliminación es exitosa
            $message = "cuenta de cobro eliminada correctamente";
            return view('errors.exitosa', compact('message'));
        } catch (\Illuminate\Database\QueryException $e) {
            // Si hay una violación de la restricción de clave foránea, enviar mensaje de error
            if ($e->getCode() == 23000) {
                $error = 400;
            $message = "Error al intentar eliminar la cuenta de cobro, ya que esta relacionada con otros registros";
            return view('errors.middleware', compact('error', 'message'));
            }
        }
    }
}
