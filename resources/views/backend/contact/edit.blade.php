@section('title','Liên hệ')

@include('backend.menuadmin')


<form enctype="multipart/form-data" method="POST" action="{{route('contact.update',[$contact->id])}}">
    @method('PUT')
    @csrf
    <div class="content-wrapper">
        <x-app-layout>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <strong class="fs-3">CẬP NHẬT LIÊN HỆ</strong>
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
                            <a class="btn btn-sm btn-success" href="{{route('contact.index')}}">
                                <i class="fas fa-arrow-left"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{(session('status'))}}
                    </div>
                    @endif
                    <div class="row">

                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="name">Tên liên hệ</label>
                                <input name="name" id="name" value="{{$contact->name}}" type="text" class="form-control" required
                                    placeholder="Nhập tên thương hiệu">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input name="email" value="{{$contact->email}}" id="email" type="text" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="phone">Số điện thoại</label>
                                <input name="phone" value="{{$contact->phone}}" id="phone" type="text" required class="form-control">
                            </div>
                           
                            <div class="mb-3">
                                <label for="address">Tiêu đề</label>
                                <input name="address" value="{{$contact->address}}" id="address" type="text" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="content">Nội dung</label>
                                <textarea name="content" id="content" 
                                class="form-control" rows="3" required
                                    placeholder="">{{$contact->content}}</textarea>
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

