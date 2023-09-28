@extends('layouts.app')

@section('content')
@include('layouts.menu')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <strong class="fs-3">THÙNG RÁC SÁCH</strong>
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
                    <a class="btn btn-sm btn-success" href="{{route('book.index')}}">
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
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 30px;">
                                <input type="checkbox" name="checkAll" />
                            </th>
                            <th class="text-center" style="width: 80px;">Ảnh bìa</th>

                            <th class="text-center">Tên sách</th>
                            <th class="text-center">Thể loại</th>
                      
                            <th class="text-center">Slug</th>
                            <th class="text-center" style="width: 200px;">Ngày tạo</th>
                            <th class="text-center" style="width: 200px;">Chức năng</th>
                            <th class="text-center" style="width: 30px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($book as $key => $bookk)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="checkID[]" value="" />
                            </td>
                            <td class="text-center" >
                                <img src="{{asset('public/image/book/' .$bookk->image)}}" height="100" width="80" alt="">
                            </td>
                            <td class="text-center">{{$bookk->name}}</td>
                            <td class="text-center">{{$bookk->category}}</td>

                            <td class="text-center">{{$bookk->slug}}</td>
                            <td class="text-center">{{$bookk->created_at}}</td>
                            <td class="text-center">


                               <a href="{{route('book.restore', [$bookk->id])}}" class="btn btn-sm btn-primary">
                                <i class="fas fa-undo"></i>
                                </a>
                                <a href="{{route('book.destroy', [$bookk->id])}}" class="btn btn-sm btn-danger">
                                <i class="fas fa-ban"></i>
                                </a>

                            </td>
                            <td class="text-center">{{$key}}</td>
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
    <!-- /.content -->
</div>

@endsection