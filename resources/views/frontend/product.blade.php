
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="public/image/title1.png" type="image/x-icon">
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
    <style>
      a{
          text-decoration: none;
      }
      .product{
          font-family: Arial, sans-serif;  
      }
      .card {
         
          background-color: #fff;
          border-radius:0px;
      }
      .strikethrough {
      text-decoration: line-through;
      
      }
      .mouse :hover{
        
       
          transform: translate3d(0, -.05rem, 0);
         
      }
  
      
      .phantrang nav ul{
          border-radius: none;
      }
      .phantrang nav ul li {
            margin-right: 30px;
            color: black;
      }
  
  .phantrang .pagination .page-item .page-link{
          font-size: 1.2em;
  }
  .phantrang .pagination .page-item a:hover {
      color: red !important;
  }
  .phantrang .pagination .page-item.disabled span:hover{
      color: red !important;
  }
  .phantrang .pagination .page-item a {
      background-color: transparent !important;
      border: none;
      color: black;
  }
  
  .phantrang .pagination .page-item.active span{
      background-color: rgb(0, 0, 0);
      border-color:black;
      color: rgb(255, 255, 255);
   
  
  }
  
  .phantrang .pagination .page-item.disabled span{
      background-color: transparent !important;
      border: none;
      color: black;
  }
  </style>
 <div class="container">
    @include('frontend.header')
    <div>
        <x-mainmenu/>
    </div>
  <div class="text-center mt-5">
  <h2>
      <b>
        TẤT CẢ SẢN PHẨM
      </b>
  </h2>
  </div>
  <div class="product container">
          <div class="row" style="margin-left:10px;">
              <div class="col-md-11 offset-md-1">
              @foreach($product as $key => $values)
            
               
           
                  <div class="mouse">
                   
                      <div class="col-md-3 p-2" style="float: left; width:230px; height:300px;   ">
                      
                          <a href="">
          
                              <div class="card w-100 h-100" >
                                  <img src="{{ asset('image/product/' . $values->image) }}"
                                  class="d-block w-100" style="height:180px"
                                      alt="{{ $values->image }}">
          
                                  <div  class="p-2" style="font-size: .85rem; height:100px">
                                      <p class="product h-50" >{{ $values->name }}</p>
                                      
                                          <p class="fs-7">
                                              <b>
                              <span class="text-dark">{{ $values->price }}đ</span>
                                             </b>
                                              </p>
                                  </div>
                              </div>
                          </a>
                        </div>
                      </div>
            
              @endforeach
          </div>
          </div>
  </div>
  <div class="container text-center mt-5">
      <div class="row align-items-start">
        <div class="col">
       
        </div>
        <div class="col">
          <div class="phantrang">
              <nav aria-label="Page navigation" class="">
                  <div class="bg-body-tertiary" style="margin-left:0px">
                      {!! $product ->links() !!}
                  </div>
                 
              </nav>
          </div>
         
        </div>
        <div class="col">
       
        </div>
      </div>
    </div>

    @include('frontend.contact')
 </div>
    </body>
</html>
