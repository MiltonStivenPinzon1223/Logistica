@extends('layouts.auth')

@section('content')
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <form method="POST" action="{{ route('logistics.store') }}">
                @csrf
            <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h3>Registro de logisticos</h3>
                </div>
                <div class="form-floating mb-3">
                    <input id="celular" type="number" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}" required autocomplete="celular" autofocus>

                                @error('celular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <label for="floatingText text-black">Celular</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea id="description" type="number" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="name" autofocus></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <label for="floatingText text-black">Regalanos una descripción tuya</label>
                </div>
                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Siguiente</button>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
