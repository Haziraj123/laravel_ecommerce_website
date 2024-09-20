<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
               Our <span>products</span>
            </h2>
        </div>

        {{-- category line filter and search display here --}}
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{ url('product_details', $product->id) }}" class="option2">More_Info</a>
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                    </div>
                    <div class="detail-box">
                        <h5>{{ $product->title }}</h5>
                        @if($product->discount_price != null)
                            <h6 style="color:red">${{ $product->discount_price }}</h6>
                            <h6 style="text-decoration:line-through; color:grey;">${{ $product->price }}</h6>
                        @else
                            <h6>${{ $product->price }}</h6>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- View More Button -->
        <div class="row justify-content-center mt-4">
            <div class="col-md-12 text-center">
                <a href="{{ url('shop') }}" class="btn btn-primary oval-btn">View More</a>
            </div>
        </div>
    </div>
</section>

<!-- CSS for oval-shaped button -->
<style>
    .oval-btn {
        padding: 10px 30px;
        border-radius: 50px; /* Makes the button oval */
        font-size: 16px;
        text-transform: uppercase;
        background-color: #007bff; /* Adjust background color */
        color: white;
        border: none;
    }

    .oval-btn:hover {
        background-color: #0056b3; /* Darker shade on hover */
        text-decoration: italic;
    }
</style>    

<script src="home/category/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="home/category/vendor/animsition/js/animsition.min.js"></script>
<script src="home/category/vendor/isotope/isotope.pkgd.min.js"></script>
<script src="home/category/js/main.js"></script>
