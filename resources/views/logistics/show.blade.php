@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>{{$logistic->name}}</h3>
            <a href="{{route('logistics.edit', $logistic->id)}}" type="button" class="btn btn-success">Editar</a>
        </div>
    </div>
    <div class="container p-5">
        <div
        class="card text-dark bg.ligth ">
        <div class="card-body">
            <tbody>
                <tr class="">
                <p>Id del logistico: <td>{{ $logistic->id}}</td></p>
                <br>
                <p>Celular: <td>{{ $logistic->celular}}</td></p>
                <br>
                <p>Description: <td>{{ $logistic->description}}</td></p>
                <br>
                <p>Id usuario: <td>{{ $logistic->id_users}}</td></p>
                <br>
                <p>Creado la fecha: <td>{{ $logistic->created_at}}</td></p>
                <br>
                <p>Actualizado en la fecha: <td>{{ $logistic->updated_at}}</td></p>
                <td>
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