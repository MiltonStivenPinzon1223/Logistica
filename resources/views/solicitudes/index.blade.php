@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Solicitud</h2>

    <!-- Mostrar errores de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para editar solicitud -->
    <form action="{{ route('solicitudes.update', $solicitude->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Descripción -->
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $solicitude->description) }}</textarea>
        </div>

        <!-- Estado -->
        <div class="form-group">
            <label for="status">Estado</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ old('status', $solicitude->status) }}" required>
        </div>

        <!-- ID Usuario -->
        <div class="form-group">
            <label for="id_users">ID Usuario</label>
            <input type="number" class="form-control" id="id_users" name="id_users" value="{{ old('id_users', $solicitude->id_users) }}" required>
        </div>

        <!-- Botón para enviar el formulario -->
        <button type="submit" class="btn btn-primary">Actualizar Solicitud</button>
    </form>
</div>
@endsection
