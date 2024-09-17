@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid pt-4 px-4">
        @if ($user->id_roles == 1)
    <div class="row">
        <div class="col-12">
            <div class="card text-white bg-secondary">
                <div class="card-body">
                    <h4 class="card-title">{{$user->name}}</h4>
                    <p class="card-text">Rol: {{$user->roles->rol}}</p>
                    <p class="card-text">Descripcion: {{$user->logistics->description}}</p>
                    <a class="btn btn-success" href="{{route('profile.edit')}}" role="button" >Editar información</a>
                </div>
            </div>
        </div>
    </div>
    @endif
    </div>

    <!-- Footer Start -->
    {{-- <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
            <div class="row">
                <div class="col-12 col-sm-6 text-center text-sm-start">
                    &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                </div>
                <div class="col-12 col-sm-6 text-center text-sm-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                    <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Footer End -->
</div>
@endsection
