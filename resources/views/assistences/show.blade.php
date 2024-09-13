@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>Asistencias</h3>
            @if ($user->id_roles == 2)
                <a href="{{route('assistences.create')}}" type="button" class="btn btn-success">Crear</a>
            @endif
        </div>
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
            <div class="table-responsive w-100">
                <table class="table table-secondary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ingreso</th>
                            <th scope="col">Status</th>
                            <th scope="col">Nombre evento</th>
                            <th scope="col">Nombre Logistico</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assistences as $assistence)
                        <tr class="">
                        <td>{{ $assistence->id}}</td>
                        <td>{{ $assistence->updated_at}}</td>
                        <td>COMPLETADO</td>
                        <td>{{ $assistence->events->name}}</td>
                        <td>{{ $assistence->logistics->users->name}}</td>
                        <td>
                          <div class="btn-group">
                            @if ($user->id_roles == 2)
                                <a href="{{route('assistences.create')}}" type="button" class="btn btn-success">Crear</a>
                            @endif
                            <form action="{{route('assistences.destroy', $assistence->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Eliminar" class="btn btn-primary">
                            </form>
                          </div>
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
