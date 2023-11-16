@section('title','Chủ đề')

@include('backend.menuadmin')


<form enctype="multipart/form-data" method="POST" action="{{route('topic.store')}}">
    @csrf
    <div class="content-wrapper">
        <x-app-layout>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <strong class="">THÊM ĐỀ TÀI</strong>
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
                            <a class="btn btn-sm btn-success" href="{{route('topic.index')}}">
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
                                <label for="name">Tên đề tài</label>
                                <input name="name" id="name"  value="{{old('name')}}" type="text" class="form-control" required placeholder="Nhập tên đề tài">
                            </div>
                           
                            <div class="mb-3">
                                <label for="metadesc">Mô tả</label>
                                <input name="metadesc" id="metadesc"  value="{{old('metadesc')}}" type="text" class="form-control">
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


