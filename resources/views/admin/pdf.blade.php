<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Detail</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .centered {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 class="centered">Order Details</h2>
    <table>
        <tr>
            <th>Order ID</th>
            <td>#{{ $order->id }}</td>
        </tr>
        <tr>
            <th>Customer Name</th>
            <td>{{ $order->name }}</td>
        </tr>
        <tr>
            <th>Phone No</th>
            <td>{{ $order->phone }}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{ $order->address }}</td>
        </tr>
        <tr>
            <th>City</th>
            <td>{{ $order->city }}</td>
        </tr>
        <tr>
            <th>State</th>
            <td>{{ $order->state }}</td>
        </tr>
        <tr>
            <th>Postal Code</th>
            <td>{{ $order->postal_code }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $order->email }}</td>
        </tr>
        <tr>
            <th>Payment Method</th>
            <td>{{ $order->payment_method }}</td>
        </tr>
        <tr>
            <th>Payment Status</th>
            <td>{{ $order->payment_status }}</td>
        </tr>
        <tr>
            <th>Total</th>
            <td>{{ $order->total }}</td>
        </tr>
        <tr>
            <th>product Name</th>
            @foreach($order->items as $item)
            <td>{{ $item->product_title }}</td>
            @endforeach
        </tr>
        <tr>
            <th>Image</th>
            <td>
                @foreach($order->items as $item)
    @php
        $imagePath = public_path('storage/' . $item->image); // Adjust path as needed
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageType = pathinfo($imagePath, PATHINFO_EXTENSION);
    @endphp
    <img src="data:image/{{ $imageType }};base64,{{ $imageData }}" alt="{{ $item->product_title }}" width="100">
@endforeach
            </td>
        </tr>
    </table>
</body>
</html>
