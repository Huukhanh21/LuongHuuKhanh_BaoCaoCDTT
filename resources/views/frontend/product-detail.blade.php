<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="image/title1.png" type="image/x-icon">
        <title>
            {{ $product->name }}
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
       <a href="{{ route('home') }}"> <img class="" style=" width:200px" src="public/image/logo.png" alt=""></a>
   </div>

   @include('frontend.header')

<div class="container">
    <div class="menu">
        <x-mainmenu/>
    </div>
    
    <div class="container content mt-4">
        <div class="row">
                <div class="col-4">
                    <img src="{{ asset('image/product/' . $product->image) }}"
                    class="d-block w-100" 
                        alt="{{ $product->image }}">
                </div>
                <div class=" col-6">
                    <div class="mt-3"><strong class="fs-4">{{$product->name }}</strong></div>
                    <div class="mt-3"><strong class="fs-4">{{$product->price }}đ</strong></div>
                    <div class="mt-3">
                                <button type="submit"  class="btn btn-dark">Thêm vào giỏ hàng</button>
                    </div>
                    <div class="mt-3">
                      <span><strong>Danh mục:</strong></span>  {{$product->category->name}}
                   </div>
                   <div class="mt-3">
                     <span class="d-block"><strong>Chi tiết:</strong></span>
                     <span class="d-block">{{$product->detail}}</span>
                 </div>

                </div>
        </div>
    </div>

    <div class="contact mt-4">
        @include('frontend.contact')
    </div>
      
</div>

 
</body>
</html>
