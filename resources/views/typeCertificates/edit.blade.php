@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>Tipos de Certificados</h3>
        </div>
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <form action="{{route('type.certificates.update', $certificate->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Tipo de Certificado:</label>
                            <input type="text" class="form-control" id="name" placeholder="Ingrese nombre" name="name" value="{{$certificate->name}}">
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
