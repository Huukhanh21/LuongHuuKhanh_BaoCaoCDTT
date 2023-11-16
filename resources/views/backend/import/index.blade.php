@include('backend.menuadmin')

<div class="content-wrapper">
    <x-app-layout>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <strong class="fs-3">NHẬP HÀNG</strong>
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
                        <a href="{{route('productstore.create')}}" class="btn btn-sm btn-success">
                            <i class="fas fa-plus"></i> Thêm
                        </a>
                        <a href="{{ route('productstore.trash') }}" class="btn btn-sm btn-danger">
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
                            <th class="text-center" style="width: 180px;">Tên sản phẩm</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Slug</th>
                            <th class="text-center" style="width: 150px;">Giá nhập</th>
                            <th class="text-center" style="width: 200px;">Chức năng</th>
                            <th class="text-center" style="width: 30px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listproduct as $key => $value)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="checkID[]" value="" />
                            </td>
                            <td class="text-center" >
                                <img src="{{asset('image/product/' .$value->product->image)}}" height="100" width="80" alt="">
                            </td>
                            <td class="text-center">{{$value->product->name}}</td>
                            <td class="text-center">{{$value->qty}}</td>
                            <td class="text-center">{{$value->product->slug}}</td>
                            <td class="text-center">{{$value->product->price}}</td>
                            <td class="text-center">
                               
                                <a href="{{ route('productstore.delete', [$value->id])}}" class="btn btn-sm btn-info">chọn
                                   
                                </a>

                            </td>
                            <td class="text-center">{{$value->id}}</td>
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

