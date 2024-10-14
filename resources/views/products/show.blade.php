@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Product Details</h2>
    <div class="card">
        <div class="card-header">
            {{ $product->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Price: ${{ $product->price }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            @if($product->image)
                <img src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}" class="img-fluid">
            @endif
        </div>
    </div>
</div>
@endsection
