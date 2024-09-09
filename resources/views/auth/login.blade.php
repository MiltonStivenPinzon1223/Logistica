@extends('layouts.auth')

@section('content')
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h3>Inicio de Sesion</h3>
                </div>
                <div class="form-floating mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-4">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <label for="floatingPassword">Contraseña</label>
                </div>
                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
            </form>
                <p class="text-center mb-0">¿Aún no tienes cuenta? <a href="{{route('register')}}">Registrate!</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
