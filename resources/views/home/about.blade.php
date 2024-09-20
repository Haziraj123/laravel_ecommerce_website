<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>About Us</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style>
        .about-section {
    padding: 50px 0;
    background-color: #f9f9f9;
}

.about-section h1 {
    font-size: 36px;
    margin-bottom: 20px;
}

.about-section p {
    font-size: 18px;
    line-height: 1.6;
}

      </style>
   </head>
   <body>
      @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header') 
         
 

  
         <section class="about-section">
             <div class="container">
                 <h1>About Us</h1>
                 <p>Welcome to our store! We are committed to bringing you the best in fashion, innovation, and style.</p>
                 <p>Our mission is to offer high-quality products with exceptional customer service. From the latest trends to timeless pieces, we have something for everyone.</p>
                 <p>Founded with a passion for excellence, we strive to make every shopping experience a memorable one.</p>
             </div>
         </section>
         
         

      </div>
      @include('home.footer')
 
      
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>