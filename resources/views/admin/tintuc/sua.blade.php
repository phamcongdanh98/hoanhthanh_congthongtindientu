@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tuc
                            <small>{{$tintuc->TieuDe}}</small>
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
                        <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Loai Tin</label>
                                <select class="form-control" name="LoaiTin">
                                    @foreach($loaitin as $lt)
                                        <option value="{{$lt->id}}" @if($tintuc->IdLoaiTin == $lt->id)selected @endif>{{$lt->TenLoai}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="TieuDe" placeholder="Please Enter Category Name" value="{{$tintuc->TieuDe}}" />
                            </div>
                            <div class="form-group">
                                <label>TomTat</label>
                                <input class="form-control" name="TomTat" placeholder="Please Enter Category Name" value="{{$tintuc->TomTat}}" />
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea name="NoiDung" id="demo" class="form-control ckeditor" rows="6">{{$tintuc->NoiDung}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <p><img width="px" src="tintuc/{{$tintuc->Hinh}}"></p>
                                <input type="file" name="Hinh" class="form-control" >
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection