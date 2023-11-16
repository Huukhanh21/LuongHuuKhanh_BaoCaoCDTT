<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<x-app-layout>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
    
      
      
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        </a>
      </li>
    
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php?option" class="brand-link">
     
      <span class="brand-text font-weight-light text-center"><h3>Admin</h3></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="#" class="d-block ">Lương Hữu Khánh</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Trang chủ
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Trang chủ</p>
                    </a>
                  </li>
                </ul>
              </li>
               <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Sản Phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('productstore.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nhập hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('product.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sản phẩm trong kho</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('productsale.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sản phẩm khuyến mãi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('brand.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thương hiệu</p>
                </a>
              </li>
            </ul>
          </li>

  <!-- /bài viết -->
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Bài viết
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('post.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tất cả bài viết</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('topic.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chủ đề bài viết</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?option=page" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trang đơn</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?option=orderdetail" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chi tiết đơn hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('order.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Đơn hàng</p>
                </a>
              </li>
        
            </ul>
          </li>


  <!-- /giao diện -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Giao diện
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('banner.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('menu.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('config.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cấu hình</p>
                </a>
              </li>
            
            </ul>
          </li>


          <!-- /người dùng -->
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Người dùng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thành viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('customer.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Khách hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('contact.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liên hệ</p>
                </a>
              </li>
            
            </ul>
          </li>


 
         
            
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    





<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Trang quản lí Admin</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Title</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        Start creating your amazing application!
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
    <!-- /.content -->
  


 

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
</body>
</x-app-layout>
</html>

