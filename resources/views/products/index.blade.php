@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Product Catalog</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
    
    @if($products->count())
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        @if($product->image)
                            <img src="{{ asset('images/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        @else
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="No Image Available">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <p class="card-text">Price: ${{ $product->price }}</p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No products available.</p>
    @endif
</div>
@endsection
