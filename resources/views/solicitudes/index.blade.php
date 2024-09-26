@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>Solicitudes Pendientes</h3>
            <a href="{{route('solicitudes.historial')}}" class="btn btn-secondary">Historial</a>
        </div>
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
            <div class="table-responsive w-100">
                @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>ID Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitudes as $solicitude)
            <tr>
                <td>{{ $solicitude->id }}</td>
                <td>{{ $solicitude->description }}</td>
                <td>
                    {{ $solicitude->status == 0 ? 'PENDIENTE' : 'COMPLETADO' }}
                </td>
                <td>{{ $solicitude->users->name }}</td>
                <td>
                    <!-- Botón para ver -->
                    <a href="{{ route('solicitudes.show', $solicitude->id) }}" class="btn btn-info">Ver</a>

                    <!-- Botón para editar -->
                    <form action="{{route('solicitudes.destroy', $solicitude->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-success" value="{{ $solicitude->status == 0 ? 'Finalizar' : 'Reabir caso' }}">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        {{ $solicitudes->links() }}
    </div>
</div>
</div>
</div>
<!-- Sale & Revenue End -->

</div>
@endsection
