@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Evento') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('events.update', $event->id) }}">
                        @method('UPDATE')
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Evento') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{$event->name}}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha del Evento') }}</label>
                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{$event->date}}"required>
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
                                <input id="start" type="time" class="form-control @error('start') is-invalid @enderror" name="start" value="{{$event->start}}" required>
                                @error('start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="end" class="col-md-4 col-form-label text-md-right">{{ __('Fin') }}</label>
                            <div class="col-md-6">
                                <input id="end" type="time" class="form-control @error('end') is-invalid @enderror" name="end" value="{{$event->end}}" required>
                                @error('end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$event->address}}" required>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quotas" class="col-md-4 col-form-label text-md-right">{{ __('Cuotas') }}</label>
                            <div class="col-md-6">
                                <input id="quotas" type="text" class="form-control @error('quotas') is-invalid @enderror" name="quotas" value="{{$event->quotas}}" required>
                                @error('quotas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
                            <div class="col-md-6">
                                <textarea id="description" rows="3" class="form-control @error('description') is-invalid @enderror" name="description" required>{{$event->description}}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Aquí puedes agregar selectores para los IDs de tipo de ropa y usuarios -->
                        <!-- Suponiendo que tienes listas de tipos de ropa y usuarios -->
                        
                        <!-- ID Tipo de Ropa -->
                        <div class='form-group row'>
                            <label for='id_type_clothing' class='col-md-4 col-form-label text-md-right'>{{ __('Tipo de Ropa ID') }}</label>
                            
                            <div class='col-md-6'>
                                <!-- Suponiendo que tienes una colección de tipos de ropa -->
                                <!-- Reemplaza 'type_clothings' con tu colección real -->
                                <select id='id_type_clothing' name='id_type_clothing' class='form-control'>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                                    @endforeach 
                                </select>
                                @error('id_type_clothing')
                                    <span class='invalid-feedback' role='alert'>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Botón para enviar -->
                        <div class='form-group row mb-0'>
                            <div class='col-md-6 offset-md-4'>
                                <button type='submit' class='btn btn-primary'>
                                    {{ __('Crear Evento') }}
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