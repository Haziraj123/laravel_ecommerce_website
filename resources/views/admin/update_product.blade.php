<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <!-- Include your CSS files here -->
    <base href="/public">
    @include('admin.css')
    <style>
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 20px;
        }

        .form-content {
            width: 50%; /* Adjust this percentage to your preference */
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-group label {
            width: 30%; /* Adjust the width as needed */
            margin-right: 10px;
            font-weight: bold;
        }

        .form-control {
            width: 300px; /* Fixed width for input */
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 0; /* Remove extra margin */
            
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        img {
            max-width: 100px;
            height: auto;
            display: block;
            margin-top: 10px;
        }
        .form-group select {
        color: #fff; /* Set text color to white */
}
    </style>
    
</head>
<body>
    <center>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->

        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">
                <div style="display: flex; justify-content:center; align-items:center">
                    <h1>Edit Product</h1>
                </div> <br>

                <!-- Display alert -->
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: flex; justify-content: center; text-align: center; margin-top: 20px;">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

                <!-- Edit product form -->
                <form action="{{ url('/confirm_update_product/'.$product->id) }}" method="POST" enctype="multipart/form-data" class="form-content">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $product->title }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}">
                    </div>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" name="price" id="price" class="form-control" value="{{ $product->price }}">
                    </div>
                     
                    <div class="form-group">
                        <label for="discount_price">Discount Price:</label>
                        <input type="number" name="discount_price" id="discount_price"  min="0" class="form-control" value="{{ $product->discount_price }}">
                    </div>
                         
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select name="category" id="category" class="form-control">
                            <option value="" disabled>Select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_name }}" {{ $product->category == $category->category_name ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Current Image:</label>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" style="width: 100px; height: 100px;">
                    </div> 
                    <div class="form-group">
                        <label for="image">Change_Image:</label>
                        <input type="file" name="image" id="image" class="form-control">
                        
                    </div>

                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
        <!-- partial -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
    <!-- End custom js for this page -->
    </center>
</body>
</html>
