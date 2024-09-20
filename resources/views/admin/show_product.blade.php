<!DOCTYPE html>
<html lang="en">
<head>
    <title>Show Product</title>
    <!-- Required meta tags -->
    @include('admin.css')
     
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table thead {
            background-color: #333; /* Dark background for header */
        }

        .table thead th {
            color: white; /* White text for header */
            padding: 10px;
            border: 1px solid white; /* White borders */
        }

        .table tbody td {
            padding: 10px;
            border: 1px solid white; /* White borders for body cells */
            
        }

        .table tbody tr:nth-child(odd) {
            background-color: #f2f2f2; /* Light gray background for odd rows */
        }

        .table tbody tr:nth-child(even) {
            background-color: #ffffff; /* White background for even rows */
        }

        .table-container {
            display: flex;
            justify-content: center;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->

        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: flex; justify-content: center; text-align: center; margin-top: 20px;">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


                <div class="table-container">
                    <h1>Show Product</h1>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Sr.no</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>  
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->discount_price }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" style="width: 100px; height: 100px;">
                                </td>
                                <td>
                                    <a  href="{{ url('/update_product/'.$product->id) }}" class="btn btn-primary">
                                    Edit
                                </a>
                                </td>
                                 
                                <td>
                                     
                                    <form action="{{ url('/delete_product/'.$product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')      
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                    </form>                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>
</html>
