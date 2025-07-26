@extends('layouts.customer.app')

@section('content')
<div class="container mt-5">
    <h2>Checkout</h2>

    <!-- Address Form -->
    <form method="POST" action="{{ route('checkout.place') }}">
        @csrf
        <div class="row">

            <div class="col-md-6">
                <h4>Shipping Address</h4>
                <div class="form-group mb-2">
                    <label>Address Line</label>
                    <input type="text" name="line1" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label>City</label>
                    <input type="text" name="city" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label>State</label>
                    <input type="text" name="state" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label>ZIP</label>
                    <input type="text" name="zip" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label>Country</label>
                    <input type="text" name="country" class="form-control" required>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="col-md-6">
                <h4>Order Summary</h4>
                <ul class="list-group">
                    @php $total = 0; @endphp
                    @foreach($cartItems as $item)
                        <li class="list-group-item d-flex justify-content-between">
                            <span>{{ $item->product->name }} (x{{ $item->quantity }})</span>
                            <span>₹{{ $item->product->price * $item->quantity }}</span>
                        </li>
                        @php $total += $item->product->price * $item->quantity; @endphp
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Total</strong>
                        <strong>₹{{ $total }}</strong>
                    </li>
                </ul>

                <button type="submit" class="btn btn-success mt-3 w-100">Place Order</button>
            </div>
        </div>
    </form>
</div>
@endsection
