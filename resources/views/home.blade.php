@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div
                    class="card text-white bg-secondary"
                >
                    <div class="card-body">
                        <h4 class="card-title">Mis Solicitudes</h4>
                        <a name="" id="" class="btn btn-primary" href="{{route('assistences.index')}}" role="button" >Detalles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($user->id_roles == 1)
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="card text-white bg-secondary">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($events as $event)
                            <div class="col-xl-4">
                                <div class="card text-white bg-primary">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$event->name}}</h4>
                                        <p class="card-text"><b>Fecha:</b>{{$event->date}}</p>
                                        <p class="card-text"><b>Dirección:</b>{{$event->address}}</p>
                                        <p class="card-text"><b>Hora de inicio:</b>{{$event->start}}</p>
                                        <p class="card-text"><b>Hora de fin:</b>{{$event->end}}</p>
                                        <p class="card-text"><b>Cupos:</b>{{$event->quotas}}</p>
                                        <p class="card-text"><b>Descripción:</b>{{$event->description}}</p>
                                        <p class="card-text"><b>Tipo de vestimenta:</b>{{$event->type_clothing->type}}</p>
                                        <p class="card-text"><b>Organizador:</b>{{$event->users->name}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

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
