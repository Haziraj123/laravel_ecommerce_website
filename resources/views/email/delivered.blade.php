<!DOCTYPE html>
<html>
<head>
    <title>Order Delivered</title>
</head>
<body>
   
    <h1>Hi {{ $order->name }},</h1>
   @foreach($order->items as $item)
    <p>Your order #{{ $order->id }},<strong> Name: {{ $item->product_title }}</strong> has been successfully delivered.</p>
   @endforeach
    <p>Thank you for shopping with us!</p>
</body>
</html>
