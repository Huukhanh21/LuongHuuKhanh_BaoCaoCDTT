@include('backend.menuadmin')

<div class="content-wrapper">
    <x-app-layout>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <strong class="fs-3">TẤT CẢ SẢN PHẨM</strong>
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
                        <a href="{{route('productsale.create')}}" class="btn btn-sm btn-success">
                            <i class="fas fa-plus"></i> Thêm
                        </a>
                        <a href="{{ route('productsale.trash') }}" class="btn btn-sm btn-danger">
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

                            <th class="text-center" style="width: 180px;">Tên sản phẩm khuyến mãi</th>
                            <th class="text-center" style="width: 150px;">Giá</th>
                            <th class="text-center" style="width: 150px;">Giá giảm</th>
                            <th class="text-center">Ngày bắt đầu</th>
                            <th class="text-center">Ngày kết thúc</th>

                            <th class="text-center" style="width: 200px;">Chức năng</th>
                            <th class="text-center" style="width: 30px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productsale as $key => $value)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="checkID[]" value="" />
                            </td>
                            <td class="text-center" >
                                <img src="{{asset('image/product/' .$value->product->image)}}" height="100" width="80" alt="">
                            </td>
                            <td class="text-center">{{$value->product->name }}</td>
                            <td class="text-center">{{$value->product->price }}</td>
                            <td class="text-center">{{$value->pricesale}}</td>

                            <td class="text-center">{{$value->date_begin}}</td>
                            <td class="text-center">{{$value->date_end}}</td>
                        
                            <td class="text-center">
                                @if($value->status==1)
                                <a href="{{ route('productsale.status',['productsale'=>$value->id]) }}" class="btn btn-sm btn-success">
                                    <i class="fas fa-toggle-on"></i>
                                </a>
                                @else
                                <a href="{{ route('productsale.status',['productsale'=>$value->id]) }}" class="btn btn-sm btn-danger">
                                    <i class="fas fa-toggle-off"></i>
                                </a>
                                @endif

                                <a href="{{ route('productsale.edit', [$value->id])}}" class="btn btn-sm btn-primary">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ route('productsale.delete', [$value->id])}}" class="btn btn-sm btn-danger">
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

