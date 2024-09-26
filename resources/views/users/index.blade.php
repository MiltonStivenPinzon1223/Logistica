@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>Usuarios</h3>
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
                <th>Nombre</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>
                    {{ $data->status == 0 ? 'Desactivo' : 'Activo' }}
                </td>
                <td>{{ $data->roles->rol }}</td>
                <td>
                    <!-- Botón para ver -->
                    <a href="{{ route('users.show', $data->id) }}" class="btn btn-success">Ver</a>

                    <!-- Botón para editar -->
                    <form action="{{route('users.destroy', $data->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-primary" value="{{ $data->status == 0 ? 'Reactivar' : 'Desactivar' }}">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
</div>
</div>
<!-- Sale & Revenue End -->

</div>
@endsection
