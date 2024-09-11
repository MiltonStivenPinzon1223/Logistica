<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
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
        $certificates = Certificate::all();
        $user = Auth::user();
        return view('certificates.index', compact('certificates', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('certificates.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $certificate = new Certificate();
        $certificate->name = $request->name;
        $certificate->save();

        return redirect(route('certificates.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $certificate = Certificate::find($id);
        $user = Auth::user();
        return view('certificates.show', compact('certificate', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $certificate = Certificate::find($id);
        $user = Auth::user();
        return view('certificates.edit', compact('certificate', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $certificate = Certificate::find($id);
        $certificate->name = $request->name;
        $certificate->save();

        return redirect(route('certificates.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $certificate = Certificate::find($id);
        $certificate->delete();

        return redirect(route('certificates.index'));
    }
}
