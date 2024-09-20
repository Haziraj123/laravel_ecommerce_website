<!DOCTYPE html>
<html lang="en">
<head>
    <title>Category</title>
    @include('admin.css')

   
    <style>
        /* CSS for table */
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #dee2e6; /* Set border for the table */
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #dee2e6; /* Set border for table cells */
        }

        th {
            color: #000000; /* Black text color for header */
            font-weight: bold; /* Bold font for header */
        }
        .delete-button {
        background-color: #dc3545; /* Bootstrap's danger color */
        color: white;
        border: none;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
    }

    .delete-button:hover {
        background-color: #c82333; /* Darker shade on hover */
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
            <div style="display: flex;justify-content:center;text-align:center">
                <h1>
                   Add Category
                </h1>
            </div>

                 
                  <div style="display: flex; justify-content: center; text-align: center; margin-top: 40px;">
                    <form action="{{url('/add_category')}}" method="POST">
                        @csrf 
                        <div style="display: flex; align-items: center;">
                            <label for="category_name" style="margin-right: 10px;">Category Name:</label>
                            <input type="text" id="category_name" name="category_name" placeholder="Enter category..." required>
                            <button type="submit" style="margin-left: 10px;">Add Category</button> 
                        </div>
                    </form>
                   
            </div>
                    <!-- Table to display category data -->
                    <div style="margin-top: 40px;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="color: #FFFFFF;">Category Name</th>
                                    <th style="color: #FFFFFF;">Action</th>
                                </tr>
                            </thead>
                            <tbody>  
                                <!-- Add category data dynamically here -->
                              @foreach ($categories as $category)     <!--($categories)this is for db and ($category)for get the value from db-->
                                 <tr>                                     <!--or you can write ($categories as $categories) its okay -->
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        <form action="{{ url('/delete_category/'.$category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                        </form>
                                   </td> 
                                     
                                 </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
             </div>
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