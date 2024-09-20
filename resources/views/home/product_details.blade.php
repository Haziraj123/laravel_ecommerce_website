<!DOCTYPE html>
<html>
<head>
    <base href="/public">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion</title>
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <link href="home/css/style.css" rel="stylesheet" />
    <link href="home/css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <style>
        body, .hero_area {
            margin: 0;
            padding: 0;
        }
        .hero_area {
            position: relative;
        }
        .product-details {
            margin: 0 auto; /* Center the content horizontally */
            padding: 20px;
        }
        .product-details .img-box {
            margin-bottom: 20px;
            width: 300px;
            height: 300px;
        }
        .product-details .img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures the image covers the entire container */
        }
        .product-details h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        .product-details h2, .product-details h3 {
            margin-bottom: 10px;
        }
        .product-details p {
            margin-bottom: 20px;
        }
        .product-details .btn {
            padding: 10px 20px;
            font-size: 1.1rem;
        }
        .container.d-flex {
            padding-top: 20px; /* Adjust padding to control vertical spacing */
        }
        .wrap-num-product {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .wrap-num-product .btn-num-product-down,
        .wrap-num-product .btn-num-product-up {
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border: 1px solid #ddd;
            color: #333;
            background-color: #f7f7f7;
            font-size: 1.5rem;
        }
        .wrap-num-product .btn-num-product-down:hover,
        .wrap-num-product .btn-num-product-up:hover {
            background-color: #007bff;
            color: white;
        }
        /* Hide the spinner buttons */
        .wrap-num-product .num-product::-webkit-inner-spin-button,
        .wrap-num-product .num-product::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .wrap-num-product .num-product {
            width: 50px;
            height: 40px;
            text-align: center;
            border: none;
            border-left: none;
            border-right: none;
            margin: 0px;
            background-color: rgb(223, 223, 241);
            cursor: pointer;
        }
        .add-to-cart-btn {
            display: inline-block;
            border-radius: 40px; /* Rounded corners */
            background-color: #007bff; /* Initial background color */
            color: #fff; /* Font color */
            border: none;
            padding: 10px 20px;
            font-size: 1.1rem;
            transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition for background and font color */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            text-align: center;
            text-decoration: none; /* Ensure no underline */
        }
        .add-to-cart-btn:hover {
            background-color: #0c0c0c; /* Background color on hover */
            color: #fff; /* Ensure text color remains white on hover */
        }
        .add-to-cart-btn a {
            color: inherit; /* Inherit color from parent */
            text-decoration: none; /* Remove underline */
        }
        .add-to-cart-btn a:hover {
            color: inherit; /* Ensure text color remains white on hover */
            text-decoration: none; /* Remove underline */
        }
    </style>
</head>
<body>
    <div class="hero_area">
        @include('home.header')
        <div class="container d-flex align-items-center justify-content-center min-vh-100">
            <div class="row product-details align-items-center">
                <div class="col-md-6 img-box">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h1>{{ $product->title }}</h1>
                    @if($product->discount_price != null)
                        <h2 style="color:red">${{ $product->discount_price }}</h2>
                        <h3 style="text-decoration:line-through; color:grey;">${{ $product->price }}</h3>
                    @else
                        <h2>${{ $product->price }}</h2>
                    @endif
                    <h6>Product Category: {{ $product->category }}</h6>
                    <p>{{ $product->description }}</p>
                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                            <i class="fs-16 zmdi zmdi-minus">-</i>
                        </div>
                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">
                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                            <i class="fs-16 zmdi zmdi-plus">+</i>
                        </div>
                    </div>
                    <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail add-to-cart-btn" id="add-to-cart" data-product-id="{{ $product->id }}">
                       ADD TO CART
                    </button>
                </div>
            </div>
        </div>
        @include('home.footer')
        <script src="home/js/jquery-3.4.1.min.js"></script>
        <script src="home/js/popper.min.js"></script>
        <script src="home/js/bootstrap.js"></script>
        <script src="home/js/custom.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const quantityInput = document.querySelector('.num-product');
                const incrementBtn = document.querySelector('.btn-num-product-up');
                const decrementBtn = document.querySelector('.btn-num-product-down');
                const addToCartBtn = document.getElementById('add-to-cart');
                incrementBtn.addEventListener('click', function () {
                    let currentValue = parseInt(quantityInput.value);
                    if (currentValue < 10) {
                        quantityInput.value = currentValue + 1;
                    }
                });
                decrementBtn.addEventListener('click', function () {
                    let currentValue = parseInt(quantityInput.value);
                    if (currentValue > 1) {
                        quantityInput.value = currentValue - 1;
                    }
                });
                addToCartBtn.addEventListener('click', function () {
                    @if (Auth::check())
                        // User is logged in, proceed with adding to cart
                        let productId = addToCartBtn.getAttribute('data-product-id');
                        let quantity = parseInt(quantityInput.value);
                        window.location.href = `/add_cart/${productId},${quantity}`;
                    @else
                        window.location.href = `{{ route('login') }}`;
                    @endif
                }); 
            });
        </script>
    </div>
</body>
</html>
