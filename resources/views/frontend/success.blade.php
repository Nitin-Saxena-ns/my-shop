@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <img src="https://cdn-icons-png.flaticon.com/512/845/845646.png" width="100" alt="Success Icon">
        <h2 class="mt-4 text-success">Order Placed Successfully!</h2>
        <p class="mt-3">Thank you for your purchase. Your order has been placed and is being processed.</p>

        <a href="{{ url('/') }}" class="btn btn-primary mt-4">Go to Home</a>
        <a href="{{ route('orders.history') }}" class="btn btn-outline-secondary mt-4 ms-2">View My Orders</a>
    </div>
</div>
@endsection
