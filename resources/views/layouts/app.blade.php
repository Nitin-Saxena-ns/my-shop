<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My E-Commerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1 0 auto;
            padding: 20px 0;
        }
        footer {
            flex-shrink: 0;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px 0;
            width: 100%;
        }
        .search-form {
            width: 300px;
            margin-right: 20px;
        }
        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: red;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .cart-icon {
            position: relative;
        }
        .search-results {
            position: absolute;
            z-index: 1000;
            width: 300px;
            background: white;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            max-height: 400px;
            overflow-y: auto;
            display: none;
        }
        .search-item {
            padding: 10px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
        }
        .search-item:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">MyShop</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Search Bar with Results -->
                <div class="position-relative me-auto">
                    <form class="d-flex search-form">
                        <input id="search-input" class="form-control me-2" type="search" placeholder="Search products..." aria-label="Search">
                        {{-- <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button> --}}
                    </form>
                    <div id="search-results" class="search-results"></div>
                </div>

                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>

                    @auth
                      
                        <li class="nav-item">
                            <a class="nav-link cart-icon" href="{{ route('cart.view') }}">
                                <i class="fas fa-shopping-cart"></i>
                                @if(isset($cartCount) && $cartCount > 0)
                                    <span id="cart-count" class="cart-count">{{ $cartCount }}</span>
                                @endif
                            </a>
                        </li>

                        @if(Auth::user()->is_admin)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/dashboard') }}">Admin Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link" style="display: inline; cursor: pointer;">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        @yield('content')
    </main>

    <footer class="bg-dark mt-auto">
        <div class="container py-3">
          
            <hr class="bg-light">
            <div class="text-center">
                &copy; {{ date('Y') }} MyShop. All Rights Reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
        
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            
            $('#search-input').on('input', function() {
                const query = $(this).val();
                if (query.length > 2) {
                    $.ajax({
                        url: '/search',
                        method: 'GET',
                        data: { query: query },
                        success: function(response) {
                            const resultsContainer = $('#search-results');
                            resultsContainer.empty();
                            
                            if (response.length > 0) {
                                response.forEach(function(product) {
                                    resultsContainer.append(
                                        `<div class="search-item" data-id="${product.id}">
                                            <div class="d-flex">
                                                <img src="${product.image_url || '/images/placeholder.png'}" 
                                                     width="50" height="50" class="me-2">
                                                <div>
                                                    <h6>${product.name}</h6>
                                                    <p>₹${product.price}</p>
                                                </div>
                                            </div>
                                        </div>`
                                    );
                                });
                                resultsContainer.show();
                            } else {
                                resultsContainer.hide();
                            }
                        }
                    });
                } else {
                    $('#search-results').hide();
                }
            });

  
            $(document).on('click', '.search-item', function() {
                const productId = $(this).data('id');
                window.location.href = `/product/${productId}`;
            });

       
            $(document).click(function(e) {
                if (!$(e.target).closest('#search-input, #search-results').length) {
                    $('#search-results').hide();
                }
            });

          
        });
    </script>
    @stack('scripts')
</body>
</html>