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
<div class=" container pb-4">
    <strong class="" style="font-size: 25px">
        <a  class="text-decoration-none text-danger"
        href="{{ route('slug.home',['slug'=>$row_cat->slug]) }}">{{$row_cat->name }}</a>
    </strong>
 
        <div class="row">
            <div>
            @foreach($list_product as $values)

                <div class="mouse">
                 
                    <div class="col-md-3 p-2" style="float: left; width:220px; height:300px;   ">
                    
                        <a href="{{ route('slug.home',['slug'=>$values->slug])}}">
        
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