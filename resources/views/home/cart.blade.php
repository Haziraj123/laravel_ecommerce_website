<!DOCTYPE HTML>
<html>
<head>
    <base href="/public">
    <title>Add To Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="home/cart/css/animate.css">
    <link rel="stylesheet" href="home/cart/css/icomoon.css">
    <link rel="stylesheet" href="home/cart/css/ionicons.min.css">
    <link rel="stylesheet" href="home/cart/css/bootstrap.min.css">
    <link rel="stylesheet" href="home/cart/css/magnific-popup.css">
    <link rel="stylesheet" href="home/cart/css/flexslider.css">
    <link rel="stylesheet" href="home/cart/css/owl.carousel.min.css">
    <link rel="stylesheet" href="home/cart/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="home/cart/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="home/cart/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="./home/cart/css/style.css">
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    
</head>
<body>
   
    <div id="page">
        @include('home.header')     
    </div>
    <div class="colorlib-product">
        <div class="container">
            <div class="row row-pb-lg">
                <div class="col-md-10 offset-md-1">
                    <div class="process-wrap">

                      @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: flex; justify-content: center; text-align: center; margin-top: 20px;">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                      @endif
                        <div class="process text-center active">
                            <p><span>01</span></p>
                            <h3>Shopping Cart</h3>
                        </div>
                        <div class="process text-center">
                            <p><span>02</span></p>
                            <h3>Checkout</h3>
                        </div>
                        <div class="process text-center">
                            <p><span>03</span></p>
                            <h3>Order Complete</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-pb-lg">
                <div class="col-md-12">
                    <div class="product-name d-flex">
                        <div class="one-forth text-left px-4">
                            <span>Product Details</span>
                        </div>
                         
                        <div class="one-eight text-center">
                            <span>Price</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Quantity</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Total</span>
                        </div>
                        <div class="one-eight text-center px-4">
                            <span>Remove</span>
                        </div>
                    </div>

                    @foreach($cartItems as $item)
                    <div class="product-cart d-flex">
                        <div class="one-forth">
                            <div class="product-img" style="background-image: url('{{ asset('storage/' . $item->image) }}');">
                            </div>
                            <div class="display-tc">
                                <h3>{{ $item->product_title }}</h3>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <span class="price">${{ $item->price / $item->quantity }}</span>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="{{ $item->quantity }}" min="1" max="100">
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <span class="price">${{ $item->price }}</span>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <a href="{{ url('/delete_product/'.$item->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Product?')">Remove</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="row row-pb-lg">
                <div class="col-md-12">
                    <div class="total-wrap">
                        <div class="row">
                            <div class="col-sm-8">
                                <form action="#">
                                    <div class="row form-group">
                                        <div class="col-sm-9">
                                            <input type="text" name="quantity" class="form-control input-number" placeholder="Your Coupon Number...">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="submit" value="Apply Coupon" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4 text-center">
    <div class="total">
        <div class="sub">
            <p><span>Subtotal:</span> <span>${{ $cartItems->sum('price') }}</span></p>
            <p><span>Delivery:</span> <span>$0.00</span></p>
            <p><span>Discount:</span> <span>$0.00</span></p>
        </div>
        <div class="grand-total">
            <p><span><strong>Total:</strong></span> <span>${{ $cartItems->sum('price') }}</span></p>
        </div>  
    </div>
    
</div>

<div class="col-md-12 text-center" style="font-style: italic; font-weight: bold; letter-spacing: 1px;">
    <a href="{{ route('checkout') }}" class="btn btn-primary" style="font-weight: bold; font-size: 12px; padding: 12px 24px;">Proceed to Checkout</a>
</div>
         
                          
                        
                    </div>
                </div>
            </div>
        </div>
      
    </div>
    @include('home.footer')
   
    


    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
    </div>
   

    <script src="home/cart/js/jquery.min.js"></script>
    <script src="home/cart/js/popper.min.js"></script>
    <script src="home/cart/js/bootstrap.min.js"></script>
    <script src="home/cart/js/jquery.easing.1.3.js"></script>
    <script src="home/cart/js/jquery.waypoints.min.js"></script>
    <script src="home/cart/js/jquery.flexslider-min.js"></script>
    <script src="home/cart/js/owl.carousel.min.js"></script>
    <script src="home/cart/js/jquery.magnific-popup.min.js"></script>
    <script src="home/cart/js/magnific-popup-options.js"></script>
    <script src="home/cart/js/bootstrap-datepicker.js"></script>
    <script src="home/cart/js/jquery.stellar.min.js"></script>
    <script src="home/cart/js/main.js"></script>
</body>
</html>
