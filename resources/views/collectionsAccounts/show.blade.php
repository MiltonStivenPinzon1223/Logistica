<!-- resources/views/collectionaccounts/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row justify-content-center container pt-5">
            <div class="col-md-12">
                <div class="card bg-secondary ">
                    <div class="card-header bg-primary text-white">
                        <h3>Cuenta de cobro</h3>
                        @if ($user->id_roles == 2)
                            <a href="{{route('collection.accounts.edit', $collectionAccount->id)}}" type="button" class="btn btn-success">Editar</a>
                        @endif
                    </div>

                    <div class="card-body">
                        <h4>Cuenta de cobro</h4>
                        <dl class="row">
                            <dt class="col-sm-4">ID</dt>
                            <dd class="col-sm-8">{{ $collectionAccount->id }}</dd>
                            <dt class="col-sm-4">Price</dt>
                            <dd class="col-sm-8">${{ $collectionAccount->price }}.000</dd>
                            <dt class="col-sm-4">URL</dt>
                            <dd class="col-sm-8"><a href="{{ $collectionAccount->url }}">Ver archivo</a></dd>
                            <dt class="col-sm-4">Status</dt>
                            <dd class="col-sm-8">
                                @switch($collectionAccount->status)
                                            @case(1)
                                                Por revisar
                                                @break
                                            @case(2)
                                                Cancelado
                                                @break
                                            @case(3)
                                                Rechazado
                                                @break
                                            @default
                                        @endswitch
                            </dd>
                            
                            <dt class="col-sm-4">Evento</dt>
                            <dd class="col-sm-8">{{ $collectionAccount->assistences->events->name}}</dd>
                            <dt class="col-sm-4">Coordinador</dt>
                            <dd class="col-sm-8">{{ $collectionAccount->assistences->events->users->name}}</dd>
                        </dl>

                        @if ($user->id_roles == 2)
                        <a href="{{ route('collection.accounts.edit', $collectionAccount->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('collection.accounts.destroy', $collectionAccount->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
