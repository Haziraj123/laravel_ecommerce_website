<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  
    <title>Settings Page</title>  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <style>  
        body {  
            background-color: #f8f9fa;  
            font-family: Arial, sans-serif;  
        }  
        .container {  
            max-width: 600px;  
            margin: 50px auto;  
            padding: 20px;  
            background-color: #ffffff;  
            border-radius: 8px;  
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);  
        }  
        h2 {  
            text-align: center;  
            margin-bottom: 20px;  
        }  
        .form-group img {  
            margin-top: 10px;  
            border-radius: 5px;  
        }  
        .alert {  
            margin-top: 20px;  
        }  
    </style>  
</head>  
<body>  
    <div class="container">  
        <h2>Settings</h2>  
    
        @if (session('success'))  
        <div class="alert alert-success alert-dismissible fade show" role="alert">  
            {{ session('success') }}  
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">  
                <span aria-hidden="true">&times;</span>  
            </button>  
        </div>  
        @endif  
    
        <form action="{{ route('admin.updateSettings') }}" method="POST" enctype="multipart/form-data">  
            @csrf  
    
            <div class="form-group">  
                <label for="name">Name:</label>  
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>  
            </div>  
    
            <div class="form-group">  
                <label for="email">Email:</label>  
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>  
            </div>  
    
            <div class="form-group">  
                <label for="image">Profile Image:</label>  
                <input type="file" name="image" class="form-control">  
                @if($user->profile_photo_path)  
                    <img src="{{ asset($user->profile_photo_path) }}" class="img-thumbnail" width="150">  
                @else  
                    <p>No image uploaded.</p>  
                @endif  
            </div>  
    
            <button type="submit" class="btn btn-primary btn-block">Update Profile</button>  
        </form>  
    </div>  

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
</body>  
</html>