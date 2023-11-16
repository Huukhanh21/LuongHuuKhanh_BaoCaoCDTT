<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="public/image/partner_3.png" type="image/x-icon">
        <title>
      
           K-Bike
        </title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  />
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
   
    </head>
    <body class="antialiased bg-body-tertiary">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <div class="">
         <img class="" style=" width:200px" src="public/image/logo.png" alt="">
    </div>
    @include('frontend.header')
   <x-mainmenu></x-mainmenu>
   <x-main-banner></x-main-banner>
    <div class="card-body">
      <div class="row">
            <div class="col-md-3 mt-5 ps-5">
                @include('frontend.category')
             
            </div>
    
            <div class="col-md-9">
                <div class="ms-4 mt-5">
                    <strong>
                            SẢN PHẨM KHUYẾN MÃI
                    </strong>
                    </div>
                @include('frontend.productsale')
            </div>
    </div>
    </div>
  
    @include('frontend.detail')
    @include('frontend.contact')

 
    </body>
</html>
