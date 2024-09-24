@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>{{$certificate->name}}</h3>
            <a href="{{route('certificates.edit', $certificate->id)}}" type="button" class="btn btn-success">Editar</a>
        </div>
    </div>
    <div class="container p-5">
        <div
        class="card text-dark bg-secondary ">
        <div class="card-body">
            <tbody>
                <tr class="">
                <p>Id del certificados: <td>{{ $certificate->id}}</td></p>
                <br>
                <p>Tipo de certificados: <td>{{ $certificate->id_type_certificates}}</td></p>
                <br>
                <p>Id del logistico: <td>{{ $certificate->id_logistics}}</td></p>
                <br>
                <p>Creado la fecha: <td>{{ $certificate->created_at}}</td></p>
                <br>
                <p>Actualizado en la fecha: <td>{{ $certificate->updated_at}}</td></p>
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