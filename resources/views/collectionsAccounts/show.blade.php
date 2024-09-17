<!-- resources/views/collectionaccounts/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View Collection Account</div>

                    <div class="card-body">
                        <h4>Collection Account Details</h4>
                        
                        <dl class="row">
                            <dt class="col-sm-4">ID</dt>
                            <dd class="col-sm-8">{{ $collectionAccount->id }}</dd>
                            
                            <dt class="col-sm-4">Price</dt>
                            <dd class="col-sm-8">{{ $collectionAccount->price }}</dd>
                            
                            <dt class="col-sm-4">URL</dt>
                            <dd class="col-sm-8"><a href="{{ $collectionAccount->url }}">{{ $collectionAccount->url }}</a></dd>
                            
                            <dt class="col-sm-4">Status</dt>
                            <dd class="col-sm-8">{{ $collectionAccount->status }}</dd>
                            
                            <dt class="col-sm-4">ID Assistances</dt>
                            <dd class="col-sm-8">{{ $collectionAccount->id_assistences }}</dd>
                        </dl>

                        <a href="{{ route('collectionaccounts.edit', $collectionAccount->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('collectionaccounts.destroy', $collectionAccount->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
