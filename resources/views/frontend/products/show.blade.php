@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
          
            <div class="col-md-5">
                <img src="{{ asset($product->image ?? 'images/default.png') }}" class="img-fluid rounded shadow"
                    alt="{{ $product->name }}">
            </div>

            <div class="col-md-7">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h2>{{ $product->name }}</h2>
                <h4>₹{{ number_format($product->price, 2) }}</h4>
                <p>{{ $product->description ?? 'No description available.' }}</p>

                @auth
                    @if ($product->quantity > 0)
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="form-group">
                                <label>Quantity:</label>
                                <input type="number" name="quantity" value="1" min="1"
                                    max="{{ $product->quantity }}" class="form-control w-25">
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Add to Cart</button>
                        </form>
                    @else
                        <div class="alert alert-warning mt-2">Out of stock!</div>
                    @endif
                @else
                    <div class="alert alert-info mt-3">
                        Please <a href="{{ route('login') }}">login</a> to add product to cart.
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
