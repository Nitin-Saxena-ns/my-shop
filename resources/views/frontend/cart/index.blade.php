@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Your Cart</h2>

        @if ($cartItems->count())
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $grandTotal = 0; @endphp
                    @foreach ($cartItems as $item)
                        @php
                            $total = $item->product->price * $item->quantity;
                            $grandTotal += $total;
                        @endphp
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item->quantity }}"
                                        class="form-control w-50 me-2" min="1">
                                    <button class="btn btn-sm btn-success">Update</button>
                                </form>
                            </td>
                            <td>₹{{ number_format($item->product->price, 2) }}</td>
                            <td>₹{{ number_format($total, 2) }}</td>
                            <td><a href="{{ route('cart.remove', $item->id) }}" class="btn btn-sm btn-danger">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-end"><strong>Grand Total:</strong></td>
                        <td colspan="2"><strong>₹{{ number_format($grandTotal, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-end mt-3">
                <a href="{{ route('checkout') }}" class="btn btn-primary btn-lg">
                    Go to Checkout
                </a>
            </div>
        @else
            <div class="alert alert-info mt-3">Your cart is empty.</div>
        @endif
    </div>
@endsection
