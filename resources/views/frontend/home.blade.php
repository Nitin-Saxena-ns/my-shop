@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            @include('frontend.partials.sidebar', ['categories' => \App\Models\Category::all()])
        </div>

        <!-- Featured Products -->
        <div class="col-md-9">
            <h2 class="mb-4">Featured Products</h2>
            <div class="row">
                @forelse ($featuredProducts as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            @if ($product->image)
                                <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}" height="200">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text text-muted">₹{{ $product->price }}</p>
                                <p class="card-text">{{ Str::limit($product->description, 60) }}</p>
                             <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-primary mt-auto">View</a>

                            </div>
                        </div>
                    </div>
                @empty
                    <p>No featured products available.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
