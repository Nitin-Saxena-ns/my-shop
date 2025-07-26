@extends('layouts.customer.app')

@section('title', 'Dashboard')

@section('page_heading', 'Customer Dashboard')

@section('content')
    <p>Welcome to your customer dashboard, {{ Auth::user()->name }}!</p>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">🛒 Go to Checkout</h5>
                    <a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">📦 View Orders</h5>
                    <a href="{{ route('orders.history') }}" class="btn btn-secondary">Order History</a>
                </div>
            </div>
        </div>
    </div>
@endsection
