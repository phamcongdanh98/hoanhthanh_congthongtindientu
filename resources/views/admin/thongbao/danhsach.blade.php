@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thông báo
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    @if(session('thongbao'))
                            <div class ="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Nội Dung</th>                              
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($thongbao as $tb)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tb->id}}</td>
                                <td>{{$tb->TieuDe}}</td>
                                <td><p style="line-height: 18px;;width: 300px;height: 88px;text-overflow: ellipsis;overflow: hidden;-webkit-line-clamp: 8;">{{$tb->NoiDung}}</p></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/thongbao/xoa/{{$tb->id}}">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/thongbao/sua/{{$tb->id}}">Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection        