@section('title','Danh sách danh mục')
@include('backend.menuadmin')

<div class="content-wrapper">

    <x-app-layout>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <strong class="fs-2">TẤT CẢ DANH MỤC</strong>
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
                    <div class="text-right">
                        <a href="{{route('category.create')}}" class="btn btn-sm btn-success">
                            <i class="fas fa-plus"></i> Thêm
                        </a>
                        <a href="{{ route('category.trash') }}" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>Thùng rác
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
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 30px;">
                                <input type="checkbox" name="checkAll" />
                            </th>
                            <th class="text-center">Tên danh mục</th>
                            <th class="text-center">Slug</th>
                            <th class="text-center">Danh mục cha</th>
                            <th class="text-center" style="width: 300px;">Mô tả</th>
                            <th class="text-center" style="width: 200px;">Ngày tạo</th>
                            <th class="text-center" style="width: 200px;">Chức năng</th>
                            <th class="text-center" style="width: 30px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $key => $value)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="checkID[]" value="" />
                            </td>

                            <td class="text-center">{{$value->name}}</td>
                            <td class="text-center">{{$value->slug}}</td>
                            <td class="text-center">{{$value->ParentCategory() }}</td>                            <td>{{$value->meta_desc}}</td>
                            <td class="text-center">{{$value->created_at}}</td>
                            <td class="text-center">
                                @if($value->status==1)
                                <a href="{{ route('category.status',['category'=>$value->id]) }}" class="btn btn-sm btn-success">
                                    <i class="fas fa-toggle-on"></i>
                                </a>
                                @else
                                <a href="{{ route('category.status',['category'=>$value->id]) }}" class="btn btn-sm btn-danger">
                                    <i class="fas fa-toggle-off"></i>
                                </a>
                                @endif

                                <a href="{{ route('category.edit', [$value->id])}}" class="btn btn-sm btn-primary">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ route('category.delete', [$value->id])}}" class="btn btn-sm btn-danger">
                                    <i class="fas fa-times"></i>
                                </a>

                            </td>
                            <td class="text-center">{{$value->id}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
</x-app-layout>
    <!-- /.content -->
</div>

