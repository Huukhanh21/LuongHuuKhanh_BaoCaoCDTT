

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
    padding: 10px;
    text-decoration: none;
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
  <ul class="list-inline  d-flex justify-content-center align-items-center">
  <li class="list-inline-item me-5">
    <a class="nav-link " href="#">Giới thiệu</a>
  </li>
  <li class="list-inline-item me-5">
    <a class="nav-link " href="index.php?option=product">Sản phẩm</a>
  </li>
  <li class="list-inline-item me-5">
    <a class="nav-link " href="#">Tư vấn mua xe</a>
  </li>
  <li class="list-inline-item me-5">
    <a class="nav-link " href="#">Liên hệ</a>
  </li>
  <li class="list-inline-item me-5">
    <a class="nav-link " href="#">dịch vụ</a>
  </li>
  <li class="list-inline-item ">
    <a class="nav-link " href="">Khác</a>
  </li>
</ul>

  </div>