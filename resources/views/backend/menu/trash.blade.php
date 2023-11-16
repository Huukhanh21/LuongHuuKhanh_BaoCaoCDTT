@section('title','Menu')

@include('backend.menuadmin')

<div class="content-wrapper">
    <x-app-layout>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <strong class="fs-3">THÙNG RÁC MENU</strong>
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
                    <div class="col-md-6 text-right">
                        
                        <a class="btn btn-sm btn-success" href="{{route('menu.index')}}">
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

                            <th class="text-center" style="width: 180px;">Tên menu</th>
                            <th class="text-center">Link</th>
                            <th class="text-center" style="width: 150px;">Level</th>
                            <th class="text-center" style="width: 150px;">Kiểu</th>
                       
                            <th class="text-center" style="width: 200px;">Chức năng</th>
                            <th class="text-center" style="width: 30px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menu as $key => $value)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="checkID[]" value="" />
                            </td>
                            <td class="text-center">{{$value->name}}</td>
                            <td class="text-center">{{$value->link}}</td>
                            <td class="text-center">{{$value->level}}</td>
                            <td class="text-center">{{$value->type}}</td>
                            <td class="text-center">
                      
                            

                                <a href="{{route('menu.restore', [$value->id])}}" class="btn btn-sm btn-primary">
                                <i class="fas fa-undo"></i>
                                </a>
                                <a href="{{route('menu.destroy', [$value->id])}}" class="btn btn-sm btn-danger">
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
</x-app-layout>

