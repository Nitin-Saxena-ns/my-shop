@extends('layouts.admin.admin')

@section('content')
<div class="container">
    <h2>Order #{{ $order->id }} Details</h2>
    <p><strong>User:</strong> {{ $order->user->name ?? 'Guest' }}</p>
    <p><strong>Total:</strong> ₹{{ number_format($order->total, 2) }}</p>
    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
    <p><strong>Date:</strong> {{ $order->created_at->format('d M Y h:i A') }}</p>

    <h4 class="mt-4">Order Items:</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price (₹)</th>
                <th>Qty</th>
                <th>Total (₹)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $item)
                <tr>
                    <td>{{ $item->product->name ?? 'Deleted Product' }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price * $item->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
