<?php

namespace App\Http\Controllers;

use App\Models\TypeCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = TypeCertificate::all();
        $user = Auth::user();
        return view('typeCertificates.index', compact('types', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('typeCertificates.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type = new TypeCertificate();
        $type->name = $request->name;
        $type->save();

        return redirect(route('type.certificates.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $type = TypeCertificate::find($id);
        $user = Auth::user();
        return view('typeCertificates.show', compact('type', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $type = TypeCertificate::find($id);
        $type->name = $request->name;
        $type->save();

        return redirect(route('type.certificates.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = TypeCertificate::find($id);
        $type->delete();
    }
}