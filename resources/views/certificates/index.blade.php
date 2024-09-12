@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>Certificados</h3>
            <a href="{{route('certificates.create')}}" type="button" class="btn btn-success">Crear</a>
        </div>
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
            <div class="table-responsive w-100">
                <table class="table table-secondary">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Tipo de certificados</th>
                            <th scope="col">id logistica</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($certificates as $certificate)
                        <tr class="">
                        <td>{{ $certificate->id}}</td>
                        <td>{{ $certificate->certificates->name}}</td>
                        <td>{{ $certificate->logistics->users->name}}</td>
                        <td>
                        <div class="btn-group">
                            <a href="{{route('certificates.show', $certificate->id)}}" type="button" class="btn btn-success">Detalles</a>
                            <a href="{{route('certificates.destroy', $certificate->id)}}" type="button" class="btn btn-primary">Eliminar</a>
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
