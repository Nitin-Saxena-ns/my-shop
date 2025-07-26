@extends('layouts.customer.app')

@section('title', 'Order History')

@section('page_heading', 'Your Orders')

@section('content')

@if ($orders->isEmpty())
    <div class="alert alert-info">You have not placed any orders yet.</div>
@else
    @foreach ($orders as $order)
        <div class="card mb-3 shadow-sm">
            <div class="card-header bg-primary text-white">
                <strong>Order #{{ $order->id }}</strong>
                <span class="float-end">₹{{ $order->total }} | {{ ucfirst($order->status) }}</span>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach ($order->orderItems as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $item->product->name }} (x{{ $item->quantity }})
                            <span>₹{{ $item->price * $item->quantity }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="card-footer text-muted">
                Placed on: {{ $order->created_at->format('d M Y, h:i A') }}
            </div>
        </div>
    @endforeach
@endif

@endsection
