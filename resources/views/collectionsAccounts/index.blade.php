@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>Cuentas de cobro</h3>
        </div>
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
            <div class="table-responsive w-100">
                @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Valor</th>
                                    <th>URL</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collectionAccounts as $account)
                                    <tr>
                                        <td>{{ $account->id }}</td>
                                        <td>${{ $account->price }}.000</td>
                                        <td><a href="{{ $account->url }}">Ver archivo</a></td>
                                        @switch($account->status)
                                            @case(1)
                                                <td>Por revisar</td>
                                                @break
                                            @case(2)
                                                <td>Cancelado</td>
                                                @break
                                            @case(3)
                                                <td>Rechazado</td>
                                                @break
                                            @default
                                        @endswitch
                                        <td>{{ $account->created_at }}</td>
                                        <td>
                                            @if ($user->id_roles == 1)
                                                <a href="{{ route('collection.accounts.show', $account->id) }}" class="btn btn-sm btn-success">Detalles</a>
                                            @else
                                                <a href="{{ route('collection.accounts.edit', $account->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                <form action="{{ route('collection.accounts.destroy', $account->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->

</div>
@endsection
