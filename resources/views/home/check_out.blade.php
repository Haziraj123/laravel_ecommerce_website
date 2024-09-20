<!DOCTYPE HTML>
<html>
<head>
<base href="/public">
<title>Check_out</title>
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
<link rel="stylesheet" href="home/cart/css/style.css">
 <link href="home/css/font-awesome.min.css" rel="stylesheet" />
 <link href="home/css/style.css" rel="stylesheet" />
 <link href="home/css/responsive.css" rel="stylesheet" />
 <style>
  /* Custom styles for input fields */
  .form-control {
      background-color: #f9f9f9; /* Lighter background */
      border-color: #ddd; /* Slightly darker border */
      color: #0c0c0c; /* Darker text color */
      font-family: 'Montserrat', sans-serif; /* Font style */
      font-size: 16px  ; /* Font size */
  }

  .form-control:focus {
      border-color: #007bff; /* Focus border color */
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Focus shadow */
  }

  /* Styling for form labels */
  .form-group label {
      font-family: 'Montserrat', sans-serif; /* Font style */
      font-weight: 500; /* Font weight */
      color: #333; /* Text color */
  }
  .validation-message {
      color: red;
      font-size: 14px;
      margin-top: 5px;
  }
</style>

 
</head>

<body> 

  <div id="page">
    @include('home.header')     
  </div>

  <div class="colorlib-product">
    <div class="container">
      <div class="row row-pb-lg">
        <div class="col-sm-10 offset-md-1">
          <div class="process-wrap">
            <div class="process text-center active">
              <p><span>01</span></p>
              <h3>Shopping Cart</h3>
            </div>
            <div class="process text-center active">
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
     <div class="row">
        <div class="col-lg-8">
           
            <h2>Billing Details</h2>
              <form id="payment-form" action="" method="POST" onsubmit="return validateForm();">
                @csrf
              <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" class="form-control" name="name"   value="{{ old('name', auth()->user()->name ?? '') }}"   placeholder="Your firstname">
                    <div class="validation-message" id="name-error"></div>
                  </div>
            </div>
             
            <div class="col-md-12">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" class="form-control" name="address" value="{{ old('address', auth()->user()->address ?? '') }}"    placeholder="Enter Your Address">        
                    <div class="validation-message" id="address-error"></div>
                  </div>
               
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="towncity">Town/City</label>
                    <input type="text" id="towncity" class="form-control" name="city"  value="{{ old('city') }}"             placeholder="Town or City">           
                    <div class="validation-message" id="towncity-error"></div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="stateprovince">State/Province</label>
                    <input type="text" id="stateprovince" class="form-control" name="state"   value="{{ old('state') }}"            placeholder="State Province">        
                    <div class="validation-message" id="state-error"></div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="zippostalcode">Zip/Postal Code</label>
                    <input type="text" id="zippostalcode" class="form-control" name="postal_code" value="{{ old('postal_code') }}"    placeholder="Zip / Postal">        
                    <div class="validation-message" id="postal-code-error"></div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">E-mail Address</label> 
                    <input type="email" id="email" class="form-control" name="email" value="{{ old('email', auth()->user()->email ?? '') }}"       placeholder="E-mail Address">                   
                    <div class="validation-message"  id="email-error"></div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" class="form-control" name="phone" value="{{ old('phone', auth()->user()->phone ?? '') }}"    placeholder="Phone Number">            
                    <div class="validation-message" id="phone-error"></div>
                  </div>
            </div>
            </div>
        
        </div>
        <div class="col-lg-4">
          <div class="cart-summary">

            <div class="cart-detail">
              <h2>Cart Total</h2>
              <ul>
                <!-- Loop through cart items -->
                @foreach($cartItems as $item)
                  <li>
                    <span>{{ $item->quantity }} x {{ $item->product_title  }}</span>
                    <span>${{ $item->price   }}</span>
                  </li>
                @endforeach
                <li>
                  <span>Shipping</span>
                  <span>${{ $shippingCost }}</span>
                </li>
                <!-- Calculate order total -->
                <li> <b>
                  <span>Order Total</span>
                  <span>${{ $cartItems->sum(fn($item) => $item->price ) + $shippingCost }}</span>
                  </b>
                </li>
              </ul>
            </div>
            
            <div class="cart-detail">
              <h2>Payment Method</h2>
            
                  @foreach($cartItems as $item)
                      <input type="hidden" name="cartItems[{{ $loop->index }}][product_id]" value="{{ $item->product_id }}">
                      <input type="hidden" name="cartItems[{{ $loop->index }}][product_title]" value="{{ $item->product_title }}">
                      <input type="hidden" name="cartItems[{{ $loop->index }}][quantity]" value="{{ $item->quantity }}">
                      <input type="hidden" name="cartItems[{{ $loop->index }}][price]" value="{{ $item->price }}">
                      <input type="hidden" name="cartItems[{{ $loop->index }}][image]" value="{{ $item->image }}">
                  @endforeach
                  
                  <div class="form-group">  
                    <label style="display: inline-flex; align-items: center; white-space: nowrap;">  
                        <input type="radio" name="payment_method" value="stripe" required >  
                        Stripe Method  
                    </label>  
                </div>
                  <div class="form-group">
                      <label style="display: inline-flex; align-items: center; white-space: nowrap;">
                          <input type="radio" name="payment_method" value="cod" required> Cash on Delivery
                      </label>
                  </div>
                 </div>
                  <div class="row">
                      <div class="col-md-12 text-center">
                          <button type="button" onclick="submitPaymentForm()" class="btn btn-primary">Place an Order</button>
                      </div>
                  </div>
              </form>
         
                    
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
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

  
    


  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vef91dfe02fce4ee0ad053f6de4f175db1715022073587" integrity="sha512-sDIX0kl85v1Cl5tu4WGLZCpH/dV9OHbA4YlKCuCiMmOQIk4buzoYDZSFj+TvC71mOBLh8CDC/REgE0GX0xcbjA==" data-cf-beacon='{"rayId":"88df6d528897c8fc","b":1,"version":"2024.4.1","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
   

  <script>
        function validateForm() {
    let isValid = true;

    // Clear previous error messages
    document.querySelectorAll('.validation-message').forEach(el => el.textContent = '');

    // Get form fields
    const name = document.getElementById('name');
    const address = document.getElementById('address');
    const city = document.getElementById('towncity');
    const state = document.getElementById('stateprovince');
    const postalCode = document.getElementById('zippostalcode');
    const email = document.getElementById('email');
    const phone = document.getElementById('phone');

    // Validate fields
    if (name.value.trim() === '') {
        document.getElementById('name-error').textContent = 'Please enter your name';
        isValid = false;
    }
    if (address.value.trim() === '') {
        document.getElementById('address-error').textContent = 'Please enter your address';
        isValid = false;
    }
    if (city.value.trim() === '') {
        document.getElementById('towncity-error').textContent = ' Please enter your town/city ';
        isValid = false;
    }
    if (state.value.trim() === '') {
        document.getElementById('state-error').textContent = 'Please enter your state';
        isValid = false;
    }
    if (postalCode.value.trim() === '') {
        document.getElementById('postal-code-error').textContent = 'Please enter your postal-code';
        isValid = false;
    }
    if (email.value.trim() === '') {
        document.getElementById('email-error').textContent = 'Please enter your email address';
        isValid = false;
    } else if (!validateEmail(email.value.trim())) {
        document.getElementById('email-error').textContent = 'Please enter a valid email address';
        isValid = false;
    }
    if (phone.value.trim() === '') {
        document.getElementById('phone-error').textContent = 'Please enter your phone number';
        isValid = false;
    } else if (!validatePhone(phone.value.trim())) {
        document.getElementById('phone-error').textContent = 'Please enter a valid phone number';
        isValid = false;
    }

    return isValid;
}

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}

function validatePhone(phone) {
    const re = /^[0-9]{11}$/;  // Assuming a 11-digit phone number
    return re.test(String(phone));
}

function submitPaymentForm() {
    const form = document.getElementById('payment-form');
    const selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked');

    if (validateForm()) {
        if (selectedPaymentMethod) {
            if (selectedPaymentMethod.value === 'stripe') {
                form.action = "{{ route('session') }}";
            } else if (selectedPaymentMethod.value === 'cod') {
                form.action = "{{ route('Cod') }}";
            }

            console.log('Form action set to:', form.action);  // Debugging line
            form.submit();
        } else {
            alert('Please select a payment method.');
        }
    }
}

</script>

</body>

</html>
