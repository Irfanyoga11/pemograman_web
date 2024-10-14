@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Create New Product</h2>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Product Description</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" step="0.01" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
</div>
@endsection
