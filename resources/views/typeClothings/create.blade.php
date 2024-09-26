@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>Tipos de Vestimenta</h3>
        </div>
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <div class="card text-black bg-lighth w-100">
                    <div class="card-body">
                        <form action="{{route('type.clothings.store')}}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-3 mt-3">
                              <label for="name" class="form-label">Tipo de vestimenta:</label>
                              <input type="text" class="form-control" id="name" placeholder="Ingrese nombre" name="type">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Descripción:</label>
                                <input type="text" class="form-control" id="name" placeholder="Ingrese descripción" name="description">
                            </div>
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->

</div>
@endsection
