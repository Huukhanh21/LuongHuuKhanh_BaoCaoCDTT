@section('title','Khách hàng')

@include('backend.menuadmin')




<form enctype="multipart/form-data" method="POST" action="{{route('customer.store')}}">
    @csrf
    <div class="content-wrapper">
        <x-app-layout>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <strong class="">THÊM KHÁCH HÀNG</strong>
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
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6 text-right ">
                            <button name="THEM" type="submit" class="btn btn-sm btn-primary bg-primary">
                                <i class="fas fa-save"></i> Lưu[Thêm]
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
                                <label for="name">Tên thành viên</label>
                                <input name="name" id="name"  value="{{old('name')}}" type="text" class="form-control" required placeholder="Nhập tên khách hàng">
                            </div>
                            <div class="mb-3">
                                <label for="username">Tên đăng nhập</label>
                                <input name="username" id="username"  value="{{old('username')}}" type="text" class="form-control" required placeholder="Nhập tên đăng nhập">
                                @if($errors->has('username'))
                                <div class="text-danger">
                                    {{ $errors->first('username') }}
                                </div>
                            @endif
                            </div>
                           
                            <div class="mb-3">
                                <label for="password">Mật khẩu</label>
                                <input name="password" id="password"  value="{{old('password')}}" type="text" class="form-control" required placeholder="Nhập mật khẩu">
                            </div>
                            <div class="mb-3">
                                <label for="gender">Giới tính</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                    <option value="Khác">Khác</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="col md-3">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input name="email" id="email"   value="{{old('email')}}" class="form-control" required placeholder="Nhập email">
                                @if($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            </div>
                          
                            <div class="mb-3">
                                <label for="phone">Số điện thoại</label>
                                <input name="phone" id="phone"   value="{{old('phone')}}" class="form-control" required placeholder="Nhập số điện thoại">
                                @if($errors->has('phone'))
                                <div class="text-danger">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            </div>
                           
                            <div class="mb-3">
                                <label for="address">Địa chỉ</label>
                                <input name="address" id="address"   value="{{old('address')}}" class="form-control" required placeholder="Nhập địa chỉ">
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


