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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('certificates.store')}}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Certificado:</label>
                            <div class="mb-3">
                                <label for="" class="form-label">Tipo de Certificado</label>
                                <select
                                    class="form-select form-select-lg"
                                    name="id_type_certificates"
                                    id=""
                                >
                                @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                                </select>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Logistico</label>
                                <select
                                    class="form-select form-select-lg"
                                    name="id_logistics"
                                    id=""
                                >
                                @foreach($logistics as $logistic)
                                <option value="{{$logistic->id}}">{{$logistic->users->name}}</option>
                                @endforeach
                                </select>
                            </div>
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
