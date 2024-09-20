@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>{{$event->name}}</h3>
            <a href="{{route('events.edit', $event->id)}}" type="button" class="btn btn-success">Editar</a>
        </div>
    </div>
    <div class="container p-5">
        <div
        class="card text-dark bg.ligth ">
        <div class="card-body">
            <tbody>
                <tr class="">
                <p>Id del evento:<td>{{ $event->id}}</td></p>
                <br>
                <p>Nombre del evento:<td>{{ $event->name}}</td></p>
                <br>
                <p>Fecha del evento:<td>{{ $event->date}}</td></p>
                <br>
                <p>Direccion del evento:<td>{{ $event->address}}</td></p>
                <br>
                <p>Hora finalización:<td>{{ $event->end}}</td></p>
                <br>
                <p>Hora de Inicio:<td>{{ $event->start}}</td></p>
                <br>
                <p>Postulantes necesarios:<td>{{ $event->quotas}}</td></p>
                <br>
                <p>Descripción del evento:<td>{{ $event->description}}</td></p>
                <br>
                <p>Tipo de vestimenta:<td>{{ $event->id_type_clothing}}</td></p>
                <br>
                <p>Id del logistico<td>{{ $event->id_users}}</td></p>
                <br>
                <p>Creado la fecha:<td>{{ $event->created_at}}</td></p>
                <br>
                <p>Actualizado en la fecha:<td>{{ $event->updated_at}}</td></p>
                <td>
                <div class="btn-group">
                </div>
                </td>
            </tr>
            </tbody>
        </div>
    </div>
    </div>
    
    
    <!-- Sale & Revenue End -->

</div>
@endsection
