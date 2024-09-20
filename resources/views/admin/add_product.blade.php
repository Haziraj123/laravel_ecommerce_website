<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Product</title>
    @include('admin.css')

    <style>
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            width: 100%;
            max-width: 600px;
        }

        .form-group label {
            width: 110px;
            margin-right: 15px; /* Adjusted margin-right for proper spacing */
            text-align: right; /* Adjusted label alignment */
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            flex: 1;
            padding: 8px;
            box-sizing: border-box;
            margin-top: 10px;
        }

        .form-group button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            margin: auto;
             
            
        }

        .form-group button:hover {
            background-color: #45a049;
        }

        .form-container h1 {
            margin-bottom: 20px;
            
        }

        .alert {
            width: 100%;
            display: flex;
            justify-content: center;
            text-align: center;
            background-color: #d4edda; /* Background color for success alert */
            color: #155724; /* Text color for success alert */
            border: 1px solid #c3e6cb; /* Border color for success alert */
            border-radius: 5px; /* Border radius for success alert */
            padding: 10px; /* Padding for success alert */
        
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.navbar')

        <div class="main-panel">
            <div class="content-wrapper">
               
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div style="display: flex;justify-content:center;text-align:center">
                    <h1>
                       Add Product
                    </h1>
                </div>

                <div class="form-container">
                    
                    <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" id="title" name="title" required>
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" rows="4" required></textarea>
                            @error('description')
                               <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" id="price" name="price" min="0" required>
                            @error('price')
                               <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                             
                        <div class="form-group">
                            <label for="discount_price">Discount Price:</label>
                            <input type="number" id="discount_price" name="discount_price" min="0" step="0.01">
                            @error('discount_price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" min="0" required>
                            @error('quantity')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select id="category" name="category" required>
                                <option value="" disabled selected>Select a category</option>
                                @foreach($categories as $id => $category_name)
                                    <option value="{{ $category_name }}">{{ $category_name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        

                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" id="image" name="image" accept="image/*" required>
                            @error('image')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.script')
</body>
</html>
