@section('title','Cấu hình')
@include('backend.menuadmin')




<form enctype="multipart/form-data" method="POST" action="{{ isset($config) ? route('config.createupdate', ['id' => $config->id]) : route('config.createupdate') }}">
    @csrf
    <div class="content-wrapper">
        <x-app-layout>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <strong class="">CẤU HÌNH</strong>
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
                            <a class="btn btn-sm btn-success" href="{{route('config.index')}}">
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
                                <label for="author">Tên tác giả</label>
                                <input name="author" id="author"  value="{{$config->author}}"  type="text" class="form-control" required placeholder="">
                            </div>
                
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input name="email" id="email"  value="{{$config->email}}"  type="text"  class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="phone">Số điện thoại</label>
                                <input name="phone" id="phone"  value="{{$config->phone}}"  type="text"   class="form-control">
                            </div>
                          
                            <div class="mb-3">
                                <label for="zalo">Zalo</label>
                                <input name="zalo" id="zalo" type="text"  value="{{$config->zalo}}"   class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="metadesc">Mô tả</label>
                                <textarea name="metadesc" id="metadesc" class="form-control" required >{{$config->metadesc}}</textarea>

                            </div>
                         
                        </div>
                
                        <div class="col md-3">
                            <div class="mb-3">
                                <label for="facebook">Facebook</label>
                                <input name="facebook" id="facebook" type="text"  value="{{$config->facebook}}"   class="form-control">
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="address">Địa chỉ</label>
                                    <input name="address" id="address" type="text"  value="{{$config->address}}"   class="form-control">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="youtube">Youtube</label>
                                    <input name="youtube" id="youtube" type="text"  value="{{$config->youtube}}"   class="form-control">
                                </div>
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

            <!-- /.card-body -->

            <!-- /.card-footer-->
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
</x-app-layout>

</form>


