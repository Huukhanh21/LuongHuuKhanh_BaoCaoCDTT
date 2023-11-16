@section('title','Khách hàng')
@include('backend.menuadmin')


<form enctype="multipart/form-data" method="POST" action="{{route('customer.update',[$customer->id])}}">
    @method('PUT')
    @csrf
    <div class="content-wrapper">
        <x-app-layout>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <strong class="fs-3">CẬP NHẬT KHÁCH HÀNG</strong>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

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
                        <div class="col md-12 text-right">
                            <button name="CAPNHAT" type="submit" class="btn btn-sm btn-primary bg-primary">
                                <i class="fas fa-save"></i> Lưu[Cập nhật]
                            </button>
                            <a class="btn btn-sm btn-success" href="{{route('customer.index')}}">
                                <i class="fas fa-arrow-left"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{(session('status'))}}
                    </div>
                    @endif  
                    <div class="row">
                        <div class="col md-9">
                            <div class="mb-3">
                                <label for="name">Tên khách hàng</label>
                                <input name="name" id="name"  value="{{$customer->name}}" type="text" class="form-control" required placeholder="Nhập tên sản phẩm">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input name="email" id="email"   value="{{$customer->email}}" class="form-control" required placeholder="Nhập email">
                            </div>
                            <div class="mb-3">
                                <label for="phone">Số điện thoại</label>
                                <input name="phone"  value="{{$customer->phone}}" id="phone" class="form-control" required placeholder="Nhập số điện thoại">
                            </div>
                            <div class="mb-3">
                                <label for="address">Địa chỉ</label>
                                <input name="address"  value="{{$customer->address}}" id="address" class="form-control" required placeholder="Nhập địa chỉ">
                            </div>
                       
                            <div class="mb-3">
                                <label for="status">Trạng thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Chưa xuất bản</option>
                                </select>
                            </div>
                        </div>
                </div>
                </div>
            </div>

            <!-- /.card-body -->

            <!-- /.card-footer-->
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
</x-app-layout>

</form>

