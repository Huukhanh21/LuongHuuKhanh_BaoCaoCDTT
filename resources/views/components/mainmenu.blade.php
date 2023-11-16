
    <style>
        .foreground-layer {
          height: 60px;
          position: relative;
          background-color: rgba(0, 0, 0, 0.9);
          color: rgb(255, 255, 255);
          
      
        }
        .list-inline {
          list-style: none;
          padding: 0;
          margin: 0;
        }
        
       
        
        .nav-link {
       
          text-decoration: none;
          margin-top: 20px
        }
      
        .list-inline-item a:hover {
          color: red;
        }
        
        .list-inline-item a:hover ~ a {
          opacity: 0.5;
        }
        
        .list-inline-item a.text-muted {
          transition: opacity 0.3s;
        }
        
      </style>
      
        <div class="foreground-layer">
            <ul class="list-inline  d-flex justify-content-center align-items-center" >
              <li class="list-inline-item me-5 pb-1 " >
                <a class="nav-link " href="{{ route('product') }}">Tất cả sản phẩm</a>
              </li>
            @foreach ($list_menu as $value)
            <li class="list-inline-item me-5 pb-1 " >
              <a class="nav-link " href="#">{{ $value->name }}</a>
            </li>
             @endforeach
          </ul>
          
        </div>