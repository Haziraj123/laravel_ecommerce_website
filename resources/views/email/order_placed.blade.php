<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation Mail</title>
</head>
<body>
    
    <h1>Thank you for your order, {{ $order->name }}!</h1>

    <p>Your order has been placed successfully. Here are the details:</p>

    <ul>
        <li><strong>Order ID:</strong> {{ $order->id }}</li>
        @if($order->items->isNotEmpty())
        @foreach($order->items as $item)
            <li><strong>Product Name:</strong> {{ $item->product_title }} </li>
        @endforeach
   
    @endif
    
        <li><strong>Total:</strong> {{ $order->total }}</li>
        <li><strong>Payment Method:</strong> {{ $order->payment_method }}</li>
        <!-- Add more details as needed -->
    </ul>

    <p>We will notify you once your order is shipped.</p>

    <p>Thank you for shopping with us!</p>
</body>
</html> 
