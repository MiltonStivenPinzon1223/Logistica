@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles de la Solicitud</h2>

    <!-- Mostrar detalles de la solicitud -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Descripción</h5>
            <p class="card-text">{{ $solicitude->description }}</p>

            <h5 class="card-title">Estado</h5>
            <p class="card-text">{{ $solicitude->status }}</p>

            <h5 class="card-title">ID Usuario</h5>
            <p class="card-text">{{ $solicitude->id_users }}</p>

            <!-- Botón para editar -->
            <a href="{{ route('solicitudes.edit', $solicitude->id) }}" class="btn btn-warning">Editar</a>
        </div>
    </div>
</div>
@endsection
