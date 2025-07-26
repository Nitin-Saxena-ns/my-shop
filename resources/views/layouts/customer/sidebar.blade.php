<div class="bg-light p-3" style="width: 250px; min-height: 100vh;">
    <h4 class="text-center">Customer Menu</h4>
    <ul class="nav flex-column mt-4">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
          <li class="nav-item">
            <a class="nav-link"  href="{{ route('cart.view') }}">My Cart</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('checkout') }}">Checkout</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('orders.history') }}">Order History</a>
        </li>
       <li class="nav-item mt-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-sm btn-danger w-100">Logout</button>
            </form>
        </li>
    </ul>

</div>
