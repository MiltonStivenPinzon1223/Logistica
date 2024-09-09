@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>Roles</h3>
        </div>
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
            <div class="table-responsive w-100">
                <table class="table table-secondary">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $rol)
                        <tr class="">
                        <td>{{ $rol->id}}</td>
                        <td>{{ $rol->rol}}</td>
                        <td>
                          <div class="btn-group">
                            <a type="button" class="btn btn-success">Editar</a>
                            <a type="button" class="btn btn-primary">Eliminar</a>
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
