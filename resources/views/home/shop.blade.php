<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Shop</title>
    <link href="home/css/style.css" rel="stylesheet" />
               {{-- for product page --}}
               <link rel="stylesheet" type="text/css" href="home/category/vendor/bootstrap/css/bootstrap.min.css">
               <link rel="stylesheet" type="text/css" href="home/category/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
               <link rel="stylesheet" type="text/css" href="home/category/fonts/iconic/css/material-design-iconic-font.min.css">
               <link rel="stylesheet" type="text/css" href="home/category/css/util.css">
               <link rel="stylesheet" type="text/css" href="home/category/css/main.css">
               <link rel="stylesheet" type="text/css" href="path/to/custom.css">
    <style>
        .filter-btn:focus {  
            outline: none; /* Removes the outline */  
            box-shadow: none; /* Removes any box shadow */  
        }
        .panel-search {
    position: relative; /* Ensure relative positioning for the container */
}

.search-icon-btn {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    width: 60px;
}
#search-btn {
    background: none; /* No background */
    border: none; /* No border */
    cursor: pointer; /* Pointer cursor */
    outline: none; /* No outline */
    
}

</style>
</head>
<body>
    @include('sweetalert::alert')
    <div class="hero_area">
        @include('home.header')
            <div class="container">
                <div class="flex-w flex-sb-m p-b-52">
                    <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 filter-btn" data-filter="*">
                            All Products
                        </button>                           
                        @foreach($categories as $category)
                        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 filter-btn" data-filter=".{{ $category->category_name }}">
                            {{ $category->category_name }}
                        </button>
                    @endforeach
                    </div>
                    <div class="flex-w flex-c-m m-tb-10">
                        <div
                            class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                            <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                            <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                            Filter
                        </div>
                        <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                            <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                            <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                            Search
                        </div>
                    </div>
                    <div class="dis-none panel-search w-full p-t-10 p-b-15">
                        <div class="bor8 dis-flex p-l-15" style="position: relative; width: 100%;">
                            <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                            <input class="mtext-107 cl2 size-114 plh2 p-r-50" type="text" name="search-product"
                                placeholder="Search" style="width: 100%; padding-right: 50px;">
                            <i class="zmdi zmdi-mail-send" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); font-size: 20px; color: #999;"></i>
                        </div>
                        
                    </div>
                    <div class="dis-none panel-filter w-full p-t-10">
                        <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                            <div class="filter-col1 p-r-15 p-b-27">
                                <div class="mtext-102 cl2 p-b-15">
                                    Sort By
                                </div>
                                <ul>
                                    <li class="p-b-6">
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            Default
                                        </a>
                                    </li>
                                    <li class="p-b-6">
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            Popularity
                                        </a>
                                    </li>
                                    <li class="p-b-6">
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            Average rating
                                        </a>
                                    </li>
                                    <li class="p-b-6">
                                        <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                            Newness
                                        </a>
                                    </li>
                                    <li class="p-b-6">
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            Price: Low to High
                                        </a>
                                    </li>
                                    <li class="p-b-6">
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            Price: High to Low
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="filter-col2 p-r-15 p-b-27">
                                <div class="mtext-102 cl2 p-b-15">
                                    Price
                                </div>
                                <ul>
                                    <li class="p-b-6">
                                        <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                            All
                                        </a>
                                    </li>
                                    <li class="p-b-6">
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            $0.00 - $50.00
                                        </a>
                                    </li>
                                    <li class="p-b-6">
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            $50.00 - $100.00
                                        </a>
                                    </li>
                                    <li class="p-b-6">
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            $100.00 - $150.00
                                        </a>
                                    </li>
                                    <li class="p-b-6">
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            $150.00 - $200.00
                                        </a>
                                    </li>
                                    <li class="p-b-6">
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            $200.00+
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="filter-col3 p-r-15 p-b-27">
                                <div class="mtext-102 cl2 p-b-15">
                                    Color
                                </div>
                                <ul>
                                    <li class="p-b-6">
                                        <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                                            <i class="zmdi zmdi-circle"></i>
                                        </span>
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            Black
                                        </a>
                                    </li>
                                    <li class="p-b-6">
                                        <span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
                                            <i class="zmdi zmdi-circle"></i>
                                        </span>
                                        <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                            Blue
                                        </a>
                                    </li>
                                    <li class="p-b-6">
                                        <span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
                                            <i class="zmdi zmdi-circle"></i>
                                        </span>
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            Grey
                                        </a>
                                    </li>
                                    <li class="p-b-6">
                                        <span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
                                            <i class="zmdi zmdi-circle"></i>
                                        </span>
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            Green
                                        </a>
                                    </li>
                                    <li class="p-b-6">
                                        <span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
                                            <i class="zmdi zmdi-circle"></i>
                                        </span>
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            Red
                                        </a>
                                    </li>
                                    <li class="p-b-6">
                                        <span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
                                            <i class="zmdi zmdi-circle-o"></i>
                                        </span>
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            White
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="filter-col4 p-b-27">
                                <div class="mtext-102 cl2 p-b-15">
                                    Tags
                                </div>
                                <div class="flex-w p-t-4 m-r--5">
                                    <a href="#"
                                        class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                        Fashion
                                    </a>
                                    <a href="#"
                                        class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                        Lifestyle
                                    </a>
                                    <a href="#"
                                        class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                        Denim
                                    </a>
                                    <a href="#"
                                        class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                        Streetstyle
                                    </a>
                                    <a href="#"
                                        class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                        Crafts
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
                 <!-- Products Display -->
                <section class="product_section layout_padding">
                    <div class="container">     
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-sm-6 col-md-4 col-lg-4  mix {{ $product->category }}">
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
                        <!-- Pagination -->
                        <div class="row justify-content-center mt-4">
                            <div class="col-md-12 text-center">
                                <div class="pagination-container">
                                    {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

    @include('home.footer')

    <script src="home/category/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="home/category/vendor/animsition/js/animsition.min.js"></script>
    <script src="home/category/vendor/isotope/isotope.pkgd.min.js"></script>
    <script src="home/category/js/main.js"></script>
    <script>
        $(document).ready(function() {
            var $grid = $('.row').isotope({
                itemSelector: '.col-sm-6',
                layoutMode: 'fitRows'
            });
            $('.filter-btn').on('click', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({ filter: filterValue });
                $('.filter-btn').removeClass('how-active1');
                $(this).addClass('how-active1');
            });
        });
    </script>
    <!--For Search bar -->
    <script>
        $(document).ready(function() {
            // Toggle Search Panel Visibility
            $('.js-show-search').on('click', function() {
                $('.panel-search').toggleClass('dis-none');
            });
            // Handling Search Input
            $('button.size-113').on('click', function(e) {
                e.preventDefault();
                let query = $('input[name="search-product"]').val();
                if (query) {
                    window.location.href = `/search?query=${query}`;
                }
            });
    
            // Alternatively, you can use form submission:
            $('input[name="search-product"]').on('keypress', function(e) {
                if (e.which == 13) {  // Enter key pressed
                    e.preventDefault();
                    let query = $(this).val();
                    if (query) {
                        window.location.href = `/search?query=${query}`;
                    }
                }
            });
        });
    </script>
     
</div>
</body>
</html>
