<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Items</title>
    @include('admin.css')
    <style>
        .table-container {
            max-width: 900px;
            margin: 0 auto;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        thead {
            background-color: #007bff;
            color: #fff;
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tbody tr:hover {
            background-color: #e9ecef;
        }
        th {
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 0.5px;
        }
        td {
            font-size: 14px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.navbar')
        
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Product ID</th>
                                <th>Product Title</th>
                                <th>Quantity</th> 
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($order_items as $item) <!-- Corrected loop variable -->
                                <tr>
                                    <td>{{ $item->order_id }}</td>  
                                    <td>{{ $item->product_id }}</td> 
                                    <td>{{ $item->product_title }}</td>  
                                    <td>{{ $item->quantity }}</td>   
                                    <td>
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->product_title }}" style="width: 100px; height: 100px;">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
             </div>
        </div>
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
