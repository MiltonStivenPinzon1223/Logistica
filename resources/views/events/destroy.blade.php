
@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Delete evento -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>Eliminar Evento</h3>
            
        </div>
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5>¿Estás seguro de que deseas eliminar el evento: <strong>{{ $type->name }}</strong>?</h5>
                        <form action="{{route('event.destroy', $type->id)}}" method="POST">
                            @csrf
                            @method('DELETE') <!-- Para el método DELETE -->
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete evento -->
</div>
@endsection

