@extends('layouts.app')

@section('content')
<div class="content container">
    <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
        <h3>Solicitudes Pendientes</h3>
        <a href="{{route('solicitudes.historial')}}" class="btn btn-secondary">Historial</a>
    </div>

    <!-- Mostrar detalles de la solicitud -->
    <div class="card bg-secondary">
        <div class="card-body">
            <h5 class="card-title">Descripción</h5>
            <p class="card-text">{{ $solicitude->description }}</p>

            <h5 class="card-title">Estado</h5>
            <p class="card-text">
                @if ($solicitude->status == 1)
                    COMPLETADO
                @else
                    PENDIENTE
                @endif
            </p>

            <h5 class="card-title">ID Usuario</h5>
            <p class="card-text">{{ $solicitude->users->name }}</p>

        </div>
    </div>
</div>
@endsection
