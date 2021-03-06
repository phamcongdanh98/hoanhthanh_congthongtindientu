@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loai Tin
                            <small>{{$loaitin->TenLoai}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{@err}}<br>
                            @endforeach
                        </div>
                        @endif
                        @if(session('thongbao'))
                            <div class ="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <form action="admin/loaitin/sua/{{$loaitin->id}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tên loại tin</label>
                                <input class="form-control" name="TenLoai" placeholder="nhap vao ten the loai" value="{{$loaitin->TenLoai}}" />
                            </div>                       
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection 