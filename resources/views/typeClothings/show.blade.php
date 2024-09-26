@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div
            class="card text-white bg-secondary"
        >
            <div class="card-body">
                <h4 class="card-title">{{$typeClothing->type}}</h4>
                <p class="card-text">{{$typeClothing->description}}</p>
                <a name="" id="" class="btn btn-primary" href="{{route('type.clothings.edit', $typeClothing->id)}}" role="button" >Editar</a>
            </div>
        </div>
        
    </div>
    <!-- Sale & Revenue End -->

</div>
@endsection
