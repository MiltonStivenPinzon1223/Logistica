@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>Cuenta de cobro</h3>
            <a href="{{route('collection.accounts.create')}}" type="button" class="btn btn-success">Crear</a>
        </div>
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
            <div class="table-responsive w-100">
                <table class="table table-secondary">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Price</th>
                            <th scope="col">Url</th>
                            <th scope="col">status</th>
                            <th scope="col">id asistencia</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collectionAccounts as $collectionAccount)
                        <tr class="">
                        <td>{{ $collectionAccount->id}}</td>
                        <td>{{ $collectionAccount->price}}</td>
                        <td>{{ $collectionAccount->url}}</td>
                        <td>{{ $collectionAccount->status}}</td>
                        <td>{{ $collectionAccount->id_assistences}}</td>
                        <td>
                        <div class="btn-group">
                            <a href="{{route('collection.accounts.show', $collectionAccount->id)}}" type="button" class="btn btn-success">Detalles</a>
                            <a href="{{route('collection.accounts.destroy', $collectionAccount->id)}}" type="button" class="btn btn-primary">Eliminar</a>
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
