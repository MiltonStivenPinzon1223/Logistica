@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List of Collection Accounts</div>

                    <div class="card-body">
                        <a href="{{ route('collectionaccounts.create') }}" class="btn btn-primary mb-3">Create New Collection Account</a>

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Price</th>
                                    <th>URL</th>
                                    <th>Status</th>
                                    <th>ID Assistances</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collectionAccounts as $account)
                                    <tr>
                                        <td>{{ $account->id }}</td>
                                        <td>{{ $account->price }}</td>
                                        <td><a href="{{ $account->url }}">{{ $account->url }}</a></td>
                                        <td>{{ $account->status }}</td>
                                        <td>{{ $account->id_assistences }}</td>
                                        <td>
                                            <a href="{{ route('collectionaccounts.edit', $account->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            <form action="{{ route('collectionaccounts.destroy', $account->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
