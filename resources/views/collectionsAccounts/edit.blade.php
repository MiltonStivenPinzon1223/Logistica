<!-- resources/views/collectionaccounts/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Collection Account</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('collectionaccounts.update', $collectionAccount->id) }}">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" class="form-control" id="price" name="price" required value="{{ old('price', $collectionAccount->price) }}">
                            </div>

                            <div class="form-group">
                                <label for="url">URL:</label>
                                <input type="text" class="form-control" id="url" name="url" required value="{{ old('url', $collectionAccount->url) }}">
                            </div>

                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="">Select Status</option>
                                    <option value="active" {{ $collectionAccount->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $collectionAccount->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_assistences">ID Assistances:</label>
                                <input type="number" class="form-control" id="id_assistences" name="id_assistences" value="{{ old('id_assistences', $collectionAccount->id_assistences) }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Update Collection Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
