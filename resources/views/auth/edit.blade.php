@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid pt-4 px-4">
        @if ($user->id_roles == 1)
    <div class="row">
        <div class="col-12">
            <div class="card text-white bg-secondary">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row h-100 w-100 align-items-center justify-content-center" style="min-height: 100vh;">
                            <div class="col-12">
                                <form method="POST" action="{{ route('profile.update') }}">
                                    @csrf
                                    @method('PUT')
                                <div class="bg-primary rounded p-4 p-sm-5 my-4 mx-3">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h3>Datos personales</h3>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                        <label for="floatingText">Nombres</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input id="celular" type="number" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ $logistic->celular }}" required autocomplete="name" autofocus>
                    
                                                    @error('celular')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                        <label for="floatingText">Celular</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input id="document" type="text" class="form-control @error('document') is-invalid @enderror" name="document" value="{{ $user->document }}" required autocomplete="name" autofocus>
                    
                                                    @error('document')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                        <label for="floatingText">Documento</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $logistic->description }}" required autocomplete="name" autofocus>
                    
                                                    @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                        <label for="floatingText">Descripción</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                    
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                        <label for="floatingInput">Email</label>
                                    </div>
                                    <button type="submit" class="btn btn-secondary py-3 w-100 mb-4">Actualizar datos</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    </div>

    <!-- Footer Start -->
    {{-- <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
            <div class="row">
                <div class="col-12 col-sm-6 text-center text-sm-start">
                    &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                </div>
                <div class="col-12 col-sm-6 text-center text-sm-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                    <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Footer End -->
</div>
@endsection
