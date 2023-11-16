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
                        
                        <a class="btn btn-sm btn-success" href="{{route('order.index')}}">
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
                                <td>{{ $order->id }}</td>
                            </tr>
                            <tr>
                                <th>Mã khách hàng</th>
                                <td>
                                    {{ $order->customer_id}}
                                </td>
                            </tr>
                            <tr>
                                <th>Tên khách hàng</th>
                                <td>
                                    {{ $order->name}}
                                </td>
                            </tr>
                            <tr>
                                <th>Số điện thoại</th>
                                <td> {{ $order->phone}}</td>
                               
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>
                                    {{ $order->email}}
                                </td>
                            </tr>
                          
                            <tr>
                                <th>Địa chỉ</th>
                                <td>
                                    {{ $order->address}}
                                </td>
                            </tr>
                            <tr>
                                <th>Ghi chú</th>
                                <td>
                                    {{ $order->note}}
                                </td>
                            </tr>
                          
                          
                            <tr>
                                <th>Ngày tạo</th>
                                <td>
                                    {{ $order->created_at}}
                                </td>
                            </tr>
                           
                            <tr>
                                <th>Ngày cập nhật</th>
                                <td>
                                    {{ $order->updated_at}}
                                </td>
                            </tr>
                           
                            <tr>
                                <th>Trạng thái</th>
                                <td>
                                    {{ $order->status}}
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