@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>{{$type->name}}</h3>
            <a href="{{route('logistics.edit', $type->id)}}" type="button" class="btn btn-success">Editar</a>
        </div>
    </div>
    <!-- Sale & Revenue End -->

</div>
@endsection
