@extends('layouts.app')

@section('content')
@include('layouts.menu')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <strong class="fs-3">TẤT CẢ THƯƠNG HIỆU</strong>
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
                    <div class="text-right">
                        <a href="{{route('brand.create')}}" class="btn btn-sm btn-success">
                            <i class="fas fa-plus"></i> Thêm
                        </a>
                        <a href="{{ route('brand.trash') }}" class="btn btn-sm btn-danger">
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
                            <th class="text-center" style="width: 80px;">Ảnh</th>

                            <th class="text-center">Tên thương hiệu</th>
                          
                            <th class="text-center">Slug</th>
                            <th class="text-center" style="width: 200px;">Ngày tạo</th>
                            <th class="text-center" style="width: 200px;">Chức năng</th>
                            <th class="text-center" style="width: 30px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brand as $key => $brand)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="checkID[]" value="" />
                            </td>
                            <td class="text-center" >
                                <img src="{{asset('public/image/brand/' .$brand->image)}}" height="100" width="80" alt="">
                            </td>
                            <td class="text-center">{{$brand->name}}</td>
                         
                            <td class="text-center">{{$brand->slug}}</td>
                            <td class="text-center">{{$brand->created_at}}</td>
                            <td class="text-center">
                                @if($brand->status==1)
                                <a class="btn btn-sm btn-success">
                                    <i class="fas fa-toggle-on"></i>
                                </a>
                                @else
                                <a href="" class="btn btn-sm btn-danger">
                                    <i class="fas fa-toggle-off"></i>
                                </a>
                                @endif

                                <a href="{{ route('brand.edit', [$brand->id])}}" class="btn btn-sm btn-primary">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ route('brand.delete', [$brand->id])}}" class="btn btn-sm btn-danger">
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

@endsection