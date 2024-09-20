<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>My Orders</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <link href="home/css/style.css" rel="stylesheet" />
    <link href="home/css/responsive.css" rel="stylesheet" />
    
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            color: #333;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        caption {
            font-size: 1.5em;
            margin: 10px 0;
        }
        
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- header section starts -->
        @include('home.header')

        <div class="container">
          
            <table>
             
                <thead>
                    <tr>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Payment Status</th>
                            <th>Payment Method</th>
                            <th>Delivery Status</th>
                            <th>Image</th>
                            <th>Action</th>
                             
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->created_at->format('Y-m-d') }}</td> <!-- Assuming you want the order date -->
                            <td>{{ $item->product_title }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ $order->total }}</td> <!-- Assuming 'total' holds the price -->
                             <td>{{ $order->payment_status }}</td>
                            <td>{{ $order->payment_method }}</td>
                            <td>{{ $order->delivery_status }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->product_title }}" style="width: 100px; height: 100px;">
                            </td>
                            <td>
                                @if($order->delivery_status == 'Processing')
                                    <a onclick="return confirm('Are you sure you want to cancel the order?')" 
                                       href="{{ url('cancel_order', $order->id) }}" 
                                       class="btn btn-danger">Cancel Order</a>
                                @elseif($order->delivery_status == 'Delivered')
                                    <a class="btn btn-danger disabled" 
                                       style="pointer-events: none;">
                                       Cancel Order
                                    </a>
                                @elseif($order->delivery_status == 'Order Cancelled')
                                    <a class="btn btn-danger disabled" 
                                       style="pointer-events: none;">
                                       Cancel Order
                                    </a>
                                @endif
                                

                                @if($order->delivery_status == 'Delivered' || $order->delivery_status == 'Order Cancelled')
                                <a onclick="return confirm('Are you sure you want to remove this order from your list?')" 
                                   href="{{ url('remove_order', $order->id) }}" 
                                   class="btn btn-warning">Remove   </a>
                              @endif
                          </td>
                             
                            
                             
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>

        @include('home.footer')
    </div>

    <script src="home/js/jquery-3.4.1.min.js"></script>
    <script src="home/js/popper.min.js"></script>
    <script src="home/js/bootstrap.js"></script>
    <script src="home/js/custom.js"></script>
</body>
</html>
