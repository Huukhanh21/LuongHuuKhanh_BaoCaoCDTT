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

    


</style>

<div class="product container">
        <div class="row" style="margin-left:10px;">
            <div class="col-md-11 offset-md-1 border border-danger">
            @foreach($formatted_products as $key => $values)
          
             
         
                <div class="mouse">
                 
                    <div class="col-md-3 p-2  " style="float: left; width:230px; height:300px;   ">
                    
                        <a href="{{ route('product.detail')}}">
        
                            <div class="card w-100 h-100" >
                                <img src="{{ asset('image/product/' . $values->image) }}"
                                class="d-block w-100" style="height:180px"
                                    alt="{{ $values->image }}"> 
        
                                <div  class="p-2" style="font-size: .85rem; height:100px">
                                    <p class="product h-50" >{{ $values->name }}</p>
                                    
                                        <p class="fs-7">
                                            <b>
                            <span class="strikethrough text-dark">{{ $values->price }}đ</span> <span class="text-danger">- {{ $values->price_sale }}đ</span>
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
