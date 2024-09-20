<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
 
    @include('admin.css')
    <style>
      .table-container {
        width: 100%;
        overflow-x: auto; /* Enables horizontal scrolling */
      }

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

      .h1 {
        font-size: 30px;
        text-align: center;
        margin-bottom: 30px;
      }

      .search-bar {
        text-align: center;
        margin-bottom: 20px;
      }

      .search-bar input[type="text"] {
        padding: 10px;
        font-size: 16px;
        width: 80%;
        max-width: 500px;
        border: 1px solid #ddd;
        border-radius: 5px;
      }

      .search-bar button {
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        background-color: #333;
        color: white;
        cursor: pointer;
        margin-left: 10px;
      }

      .search-bar button:hover {
        background-color: #555;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
       
      @include('admin.navbar')
         
      <div class="main-panel">
          <div class="content-wrapper">
            <h1 class="h1">Orders List</h1>
            <div class="search-bar">
              <input type="text" id="search" placeholder="Search orders...">
              <button type="button" onclick="searchOrders()">Search</button>
            </div>
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: flex; justify-content: center; text-align: center; margin-top: 20px;">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
            <div class="table-container">
              <table class="table">
                <thead>
                    <tr>
                        <th>User_ID</th>
                        <th>Order_ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Postal_Code</th>
                        <th>Payment_Method</th>
                        <th>Total</th>
                        <th>Payment_Status</th>
                        <th>Deliery_Status</th>
                        <th>Delivered</th>
                        <th>Print</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($order as $order)
                    <tr>
                        <td>{{$order->user_id}}</td>
                        <td>{{$order->order_id }}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->city}}</td>
                        <td>{{$order->state}}</td>
                        <td>{{$order->postal_code}}</td>
                        <td>{{$order->payment_method}}</td>
                        <td>{{$order->total}}</td> 
                        <td>{{$order->payment_status}}</td>
                        <td>
                          @if($order->delivery_status == 'Processing')
                              <span style="color:#FFA500;">{{$order->delivery_status}}</span>
                          @elseif($order->delivery_status == 'On the way')
                              <span style="color:#007BFF;">{{$order->delivery_status}}</span>
                              @elseif($order->delivery_status == 'Order Cancelled')
                              <span style="color:red;">{{$order->delivery_status}}</span>
                          @else 
                              <span style="color:#28A745;">{{$order->delivery_status}}</span>
                          @endif
                      </td>
                        

                        <td>
                          <a href="{{ url('on_the_way', $order->order_id) }}" 
                             class="btn btn-primary {{ $order->delivery_status == 'On the Way' || $order->delivery_status == 'Delivered' ? 'disabled' : '' }}">
                             On the Way
                          </a>
                          
                          <a href="{{ url('delivered', $order->order_id) }}" 
                             class="btn btn-success {{ $order->delivery_status == 'Delivered' ? 'disabled' : '' }}">
                             Delivered
                          </a>
                      </td>
                      
                      
                                                 
                        <td>
                          <a href="{{ url('print_pdf/' . $order->id) }}">
                            <i class="fas fa-print fa-3x" style="color: #0f0f0f"></i>  
                          </a>
                        </td>   
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
      </div>

    @include('admin.script')

    <script>
      function searchOrders() {
        var input = document.getElementById('search');
        var filter = input.value.toLowerCase();
        var table = document.querySelector('.table');
        var rows = table.getElementsByTagName('tr');
        
        for (var i = 1; i < rows.length; i++) {
          var cells = rows[i].getElementsByTagName('td');
          var found = false;
          for (var j = 0; j < cells.length; j++) {
            if (cells[j].innerText.toLowerCase().indexOf(filter) > -1) {
              found = true;
              break;
            }
          }
          rows[i].style.display = found ? '' : 'none';
        }
      }
    </script>

  </body>
</html>
