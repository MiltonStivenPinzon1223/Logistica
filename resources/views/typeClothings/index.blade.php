@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>Tipos de Certificados</h3>
            <a href="{{route('type.clothings.create')}}" type="button" class="btn btn-success">Crear</a>
        </div>
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
            <div class="table-responsive w-100">
                <table class="table table-secondary">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Desctiption</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($typeClothings as $typeClothing)
                        <tr class="">
                        <td>{{ $typeClothing->id}}</td>
                        <td>{{ $typeClothing->type}}</td>
                        <td>{{ $typeClothing->description}}</td>
                        <td>
                        <div class="btn-group">
                            <a href="{{route('type.clothings.show', $typeClothing->id)}}" type="button" class="btn btn-success">Detalles</a>
                            <a href="{{route('type.clothings.destroy', $typeClothing->id)}}" type="button" class="btn btn-primary">Eliminar</a>
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
