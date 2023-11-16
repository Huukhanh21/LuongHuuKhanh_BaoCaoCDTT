
@section('title','Thêm danh mục')
@include('backend.menuadmin')
<form  enctype="multipart/form-data" method="POST" action="{{route('category.store')}}">
@csrf
    <div class="content-wrapper">
        <x-app-layout>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <strong class="fs-1">THÊM DANH MỤC</strong>
         
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
                            <a class="btn btn-sm btn-success" href="{{route('category.index')}}">
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
                    <div class="row"  >
                 
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="name">Tên thể loại</label>
                                <input name="name" id="name" value="{{old('name')}}" type="text" class="form-control" required
                                    placeholder="Nhập tên thể loại">
                            </div>
                            <div class="mb-3">
                                <label for="parent_id">Cấp cha</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="1">--Chọn danh mục cha--</option>
                                    {!! $html_parent_id !!}
                                 
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="meta_desc">Mô tả</label>
                                <textarea name="meta_desc" id="meta_desc" value="{{old('meta_desc')}}" 
                                class="form-control" rows="3" required
                                    placeholder=""></textarea>
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

