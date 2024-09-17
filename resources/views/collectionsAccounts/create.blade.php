<!-- resources/views/collectionaccounts/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Collection Account</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('collectionaccounts.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>

                            <div class="form-group">
                                <label for="url">URL:</label>
                                <input type="text" class="form-control" id="url" name="url" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="">Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_assistences">ID Assistances:</label>
                                <input type="number" class="form-control" id="id_assistences" name="id_assistences">
                            </div>

                            <button type="submit" class="btn btn-primary">Create Collection Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
