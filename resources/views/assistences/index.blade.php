@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>Tipos de Asistencia</h3>
            <a href="{{route('assistences.create')}}" type="button" class="btn btn-success">Crear</a>
        </div>
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
            <div class="table-responsive w-100">
                <table class="table table-secondary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Status</th>
                            <th scope="col">Id evento</th>
                            <th scope="col">Nombre evento</th>
                            <th scope="col">Id logistico</th>
                            <th scope="col">Nombre Logistico</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assistences as $assistence)
                        <tr class="">
                        <td>{{ $assistence->id}}</td>
                        <td>{{ $assistence->Hora}}</td>
                        <td>{{ $assistence->events->name}}</td>
                        <td>
                          <div class="btn-group">
                            <a href="{{route('assistences.show', $assistence->id)}}" type="button" class="btn btn-success">Detalles</a>
                            <a href="{{route('assistences.destroy', $assistence->id)}}" type="button" class="btn btn-primary">Eliminar</a>
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
