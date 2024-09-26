@extends('layouts.app')

@section('content')
<div class="content container">
    <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
        <h3>{{$user->name}}</h3>
    </div>

    <!-- Mostrar detalles de la solicitud -->
    <div class="card bg-secondary">
        <div class="card-body">
            <h5 class="card-title">EMAIL</h5>
            <p class="card-text">{{ $user->email }}</p>

            <h5 class="card-title">Estado</h5>
            <p class="card-text">
                @if ($user->status == 1)
                    ACTIVO
                @else
                    DESACTIVO
                @endif
            </p>

            <h5 class="card-title">Rol</h5>
            <p class="card-text">{{ $user->roles->rol }}</p>

        </div>
    </div>
</div>
@endsection
