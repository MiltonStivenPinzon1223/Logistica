
@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>{{$type->name}}</h3>
            <a href="{{route('type.certificates.edit', $type->id)}}" type="button" class="btn btn-success">Editar</a>
        </div>
    </div>
    <div class="container p-5">
        <div
        class="card text-dark bg-secondary text-white">
        <div class="card-body">
            <tbody>
                <tr class="">
                <p>Id del tipo de certificados: <td>{{ $type->id}}</td></p>
                <br>
                <p>Nombre: <td>{{ $type->name}}</td></p>
                <br>
                <div class="btn-group">
                </div>
                </td>
                </tr>
                </tbody>
            </div>
        </div>
    </div>
</div>


<!-- Sale & Revenue End -->

</div>
@endsection