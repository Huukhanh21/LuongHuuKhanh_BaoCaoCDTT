
<style>
</style>


<div class="container">
    <div class="row align-items-center">
      <div class="col-md-2 text-right" style="border:5px;">
       <a href="{{ route('home') }}"> <img class="" src="{{ asset('image/LOGOK.png') }}" style="width:90px" alt=""></a>
      </div>
      <div class="col">
        <div class="search">
            <div class="input-group mb-3 border border-dark border-2">
                <input type="text" class="form-control" placeholder="Tìm sản phẩm" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <span style="width:50px;" class="bg-dark text-white text-center pt-2" id="basic-addon2"><i class="fas fa-search"></i></span>
              </div>
        </div>
       
          
      </div>
      <div class="col">
        <div class="login">
          <div class="container">
            <div class="row align-items-center text-dark">
              <div class="col">
                <a href="{{asset('logincustomer')}}" style="padding-left:72px;" class="text-dark">Đăng nhập</a>
              </div>
              |
              <div class="col">
                <a href="{{asset('register')}}" class="text-dark">Đăng kí</a>
                </div>
              <div class="col">
                <a href="{{route('cart')}}" class="text-dark"><i class="fas fa-shopping-cart fs-2"></i></a>
              </div>
            </div>
          </div>
        </div>
       

      </div>
    </div>
  </div>