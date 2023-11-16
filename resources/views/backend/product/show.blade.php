@section('title','Chi tiết sản phẩm')
@include('backend.menuadmin')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <strong class="text-dark text-lg">CHI TIẾT SẢN PHẨM</strong>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
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
                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6 text-right ">
                        
                        <a class="btn btn-sm btn-success" href="{{route('product.index')}}">
                            <i class="fas fa-arrow-left"></i> Quay về danh sách
                        </a>
                        
                    </div>
                </div>
            <div class="card-body">
                <div class="container_fluid">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tên trường</th>
                                <th>Giá trị</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                            <tr>
                                <th>id</th>
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                <th>Mã danh mục</th>
                                <td>
                                    {{ $product->category_id}}
                                </td>
                            </tr>
                            <tr>
                                <th>Mã thương hiệu</th>
                                <td>
                                    {{ $product->brand_id}}
                                </td>
                            </tr>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <td> {{ $product->name}}</td>
                               
                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td>
                                    {{ $product->slug}}
                                </td>
                            </tr>
                          
                            <tr>
                                <th>Chi tiết</th>
                                <td>
                                    {{ $product->detail}}
                                </td>
                            </tr>
                            <tr>
                                <th>Số lượng</th>
                                <td>
                                    {{ $product->qty}}
                                </td>
                            </tr>
                            <tr>
                                <th>Giá nhập</th>
                                <td>
                                    {{ $product->price_buy}}
                                </td>
                            </tr>
                            <tr>
                                <th>Giá bán</th>
                                <td>
                                    {{ $product->price}}
                                </td>
                            </tr>
                          
                            <tr>
                                <th>Ngày tạo</th>
                                <td>
                                    {{ $product->created_at}}
                                </td>
                            </tr>
                           
                            <tr>
                                <th>Ngày cập nhật</th>
                                <td>
                                    {{ $product->updated_at}}
                                </td>
                            </tr>
                           
                            <tr>
                                <th>Trạng thái</th>
                                <td>
                                    {{ $product->status}}
                                </td>
                            </tr>
                            <tr>
                                <th>Hình ảnh</th>
                                <td>
                      <img src="{{asset('image/product/' .$product->image)}}" height="200" width="200" alt="">

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
</div>