@section('title','Menu')
@include('backend.menuadmin')


<form enctype="multipart/form-data" method="POST" action="{{route('menu.store')}}">
    @csrf
    <div class="content-wrapper">
        <x-app-layout>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <strong class="fs-3">THÊM MENU</strong>
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
                            <button name="THEM" type="submit" class="btn btn-sm btn-primary bg-primary">
                                <i class="fas fa-save"></i> Lưu[Thêm]
                            </button>
                            <a class="btn btn-sm btn-success" href="{{route('menu.index')}}">
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
                                <label for="name">Tên menu</label>
                                <input name="name" id="name" value="{{old('name')}}" type="text" class="form-control" required
                                    placeholder="Nhập tên menu">
                            </div>
                            <div class="mb-3">
                                <label for="link">link</label>
                                <input name="link" value="{{old('link')}}" id="emlinkail" type="text" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="type">Kiểu</label>
                                <input name="type" value="{{old('type')}}" id="type" type="text" required class="form-control">
                            </div>
                           
                            <div class="mb-3">
                                <label for="level">level</label>
                                <input name="level" value="{{old('level')}}" id="level" type="number" required class="form-control">
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

