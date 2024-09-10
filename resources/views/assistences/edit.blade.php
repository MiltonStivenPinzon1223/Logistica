@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Edit Certificate Type Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>Editar Tipo de Asistencia</h3>
        </div>
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <form action="{{route('assistences.update', $type->id)}}" method="POST">
                            @csrf
                            @method('PUT') <!-- Para usar el método PUT en el formulario -->
                            <div class="mb-3 mt-3">
                              <label for="name" class="form-label">Tipo de asistencia:</label>
                              <input type="text" class="form-control" id="name" placeholder="Ingrese nombre" name="name" value="{{$type->name}}">
                            </div>
                            <button type="submit" class="btn btn-secondary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Certificate Type End -->
</div>
@endsection
