@section('title','Chủ đề')
@include('backend.menuadmin')


<form enctype="multipart/form-data" method="POST" action="{{route('topic.update',[$topic->id])}}">
    @method('PUT')
    @csrf
    <div class="content-wrapper">
        <x-app-layout>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <strong class="fs-3">CẬP NHẬT CHỦ ĐỀ</strong>
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
                                <label for="name">Tên chủ đề</label>
                                <input name="name" id="name"  value="{{$topic->name}}" type="text" class="form-control" required placeholder="Nhập tên sản phẩm">
                            </div>
                          
                            <div class="mb-3">
                                <label for="metadesc">Chi tiết</label>
                                <textarea name="metadesc"  value="" id="metadesc" class="form-control" required placeholder="Chi tiết sản phẩm">{{$topic->metadesc}}</textarea>
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

