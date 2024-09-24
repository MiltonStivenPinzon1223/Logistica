@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar certificado') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('certificates.update', $certificate->id) }}">
                        @method('UPDATE')
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del certificado') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text"  class="form-control @error('name') is-invalid @enderror" name="id" value="{{$certificate->id}}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha del certificado') }}</label>
                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="id_type_certificates" value="{{$certificate->id_type_certificates}}"required>
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="start" class="col-md-4 col-form-label text-md-right">{{ __('Inicio') }}</label>
                            <div class="col-md-6">
                                <input id="start" type="time" class="form-control @error('start') is-invalid @enderror" name="id_logistics" value="{{$certificate->logistics->users->name}}" required>
                                @error('start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Aquí puedes agregar selectores para los IDs de tipo de ropa y usuarios -->
                        <!-- Suponiendo que tienes listas de tipos de ropa y usuarios -->
                        
                        <!-- Botón para enviar -->
                        <div class='form-group row mb-0'>
                            <div class='col-md-6 offset-md-4'>
                                <button type='submit' class='btn btn-primary'>
                                    {{ __('Crear certificateo') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection