@section('title','Danh sách trang đơn')
@include('backend.menuadmin')

<div class="content-wrapper">
    <x-app-layout>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <strong class="fs-3">TẤT CẢ TRANG ĐƠN</strong>
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
                        <a href="{{route('page.create')}}" class="btn btn-sm btn-success">
                            <i class="fas fa-plus"></i> Thêm
                        </a>
                        <a href="{{ route('page.trash') }}" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
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
                            <th class="text-center" style="width: 100px;">Ảnh bìa</th>
                            <th class="text-center" style="width: 180px;">Tiêu đề</th>
                            <th class="text-center">Slug</th>
                            <th class="text-center">Mô tả</th>
                     
                            <th class="text-center" style="width: 200px;">Chức năng</th>
                            <th class="text-center" style="width: 30px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($page as $key => $value)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="checkID[]" value="" />
                            </td>
                            <td class="text-center" >
                                <img src="{{asset('image/page/' .$value->image)}}" height="100" width="80" alt="">
                            </td>
                            <td class="text-center">{{$value->name}}</td>
                            <td class="text-center">{{$value->category->name }}</td>
                            <td class="text-center">{{$value->slug}}</td>
                            <td class="text-center">{{$value->price_buy}}</td>

                            <td class="text-center">{{$value->price}}</td>
                        
                            <td class="text-center">
                                @if($value->status==1)
                                <a href="{{ route('page.status',['page'=>$value->id]) }}" class="btn btn-sm btn-success">
                                    <i class="fas fa-toggle-on"></i>
                                </a>
                                @else
                                <a href="{{ route('page.status',['page'=>$value->id]) }}" class="btn btn-sm btn-danger">
                                    <i class="fas fa-toggle-off"></i>
                                </a>
                                @endif

                                <a href="{{ route('page.edit', [$value->id])}}" class="btn btn-sm btn-primary">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ route('page.show', [$value->id])}}" class="btn btn-sm btn-info">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('page.delete', [$value->id])}}" class="btn btn-sm btn-danger">
                                    <i class="fas fa-times"></i>
                                </a>

                            </td>
                            <td class="text-center">{{$key}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
           
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
</x-app-layout>

