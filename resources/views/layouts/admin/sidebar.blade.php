<div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
    <h4 class="text-center">Admin Panel</h4>
    <hr>
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link text-white" href="{{ url('/admin/dashboard') }}">Dashboard</a>
        </li>

        {{-- Categories  --}}
        <li class="nav-item mb-2">
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#categoriesDropdown" role="button"
                aria-expanded="false" aria-controls="categoriesDropdown">
                Categories ▾
            </a>
            <div class="collapse ps-3" id="categoriesDropdown">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.categories.index') }}">All Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.categories.create') }}">Add Category</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- Products  --}}
        <li class="nav-item mb-2">
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#productMenu" role="button"
                aria-expanded="false" aria-controls="productMenu">
                Products ▾
            </a>
            <div class="collapse" id="productMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item mb-1">
                        <a class="nav-link text-white" href="{{ route('admin.products.index') }}">All Products</a>
                    </li>
                    <li class="nav-item mb-1">
                        <a class="nav-link text-white" href="{{ route('admin.products.create') }}">Add Product</a>
                    </li>
                </ul>
            </div>
        </li>
        {{-- orders  --}}
        <li class="nav-item mb-2">
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#ordersMenu" role="button"
                aria-expanded="false" aria-controls="ordersMenu">
                Orders ▾
            </a>
            <div class="collapse ps-3" id="ordersMenu">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.orders.index') }}">All Orders</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item mt-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-sm btn-danger w-100">Logout</button>
            </form>
        </li>
    </ul>
</div>
