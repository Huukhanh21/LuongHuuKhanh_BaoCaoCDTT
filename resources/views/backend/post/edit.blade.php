@section('title','Sửa bài viết')
@include('backend.menuadmin')


<form enctype="multipart/form-data" method="POST" action="{{route('post.update',[$post->id])}}">
    @method('PUT')
    @csrf
    <div class="content-wrapper">
        <x-app-layout>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <strong class="fs-3">CẬP NHẬT BÀI VIẾT</strong>
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
                            <a class="btn btn-sm btn-success" href="{{route('post.index')}}">
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
                                <label for="title">Tên bài viết</label>
                                <input name="title" id="title"  value="{{$post->title}}" type="text" class="form-control" required placeholder="Nhập tên sản phẩm">
                            </div>
                            <div class="mb-3">
                                <label for="slug">Slug</label>
                                <input name="slug" id="slug"   value="{{$post->slug}}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="type">Kiểu</label>
                                <input name="type" id="type"  value="{{$post->type}}" type="text" class="form-control">
                            </div>
                           
                            <div class="mb-3">
                                <label for="metadesc">Mô tả</label>
                                <textarea name="metadesc"  value="" id="metadesc" class="form-control" required placeholder="Mô tả sản phẩm">{{$post->metadesc}}</textarea>
                            </div>
                         
                        </div>
                
                        <div class="col md-3">
                            <div class="mb-3">
                                <label for="">Chủ đề bài viết</label>
                                <select name="topic" id="" class="form-control">
                                    <option>Chọn chủ đề</option>
                                    @foreach($topic as $key => $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div class="mb-3">
                                <label for="detail">Chi tiết</label>
                                <textarea name="detail"  value="" id="detail" class="form-control" required placeholder="Chi tiết sản phẩm">{{$post->detail}}</textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="image">Hình ảnh</label>
                                <input name="image" id="image" value="{{$post->image}}" type="file" class="form-control">
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

