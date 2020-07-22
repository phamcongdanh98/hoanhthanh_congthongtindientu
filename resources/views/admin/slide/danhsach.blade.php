@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>Danh Sach</small>
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
                                <th>Tên slide</th>
                                <th>Hình</th>
                                <th>Nội Dung</th>                              
                                <th>Nguồn</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($slide as $sd)
                            <tr class="odd gradeX" align="center">
                                <td>{{$sd->id}}</td>
                                <td>{{$sd->Ten}}</td>
                                <td>
                                    <img width="400px" src="slide/{{$sd->Hinh}}">
                                </td>
                                <td><p style="line-height: 18px;;width: 300px;height: 88px;text-overflow: ellipsis;overflow: hidden;-webkit-line-clamp: 8;">{{$sd->NoiDung}}</p></td>
                                <td>{{$sd->link}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/xoa/{{$sd->id}}">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/sua/{{$sd->id}}">Sửa</a></td>
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