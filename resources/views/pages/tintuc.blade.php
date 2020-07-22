@extends('layout.index')

@section('content')
    <div class="container">
        <!-- @include('layout.slide') -->
        <div style="margin-top: 45px;border-top: solid;" class="row">

            <!-- Blog Post Content Column -->

            <div style="border: solid;margin-top: 5px;padding: 0px 32px;" class="col-lg-9">


                <!-- Blog Post -->

                <!-- Title -->
                <div class="panel-heading danh" style="background-color:#337AB7; color:white;margin-left: -32px;margin-right: -32px;" >
                    @foreach($loaitin as $lt)
                     @if($lt->id==$tintuc->IdLoaiTin)
                        <a href="{{route('loaitin',['id'=>$lt->id])}}"><h2 style="margin-top:0px; margin-bottom:0px;">{{$lt->TenLoai}}</h2></a>
                    @endif
                    @endforeach
                    </div>
                <h2 style="font-size: 20px;font-weight: bold;">{{$tintuc->TieuDe}}</h2>
                <!-- Author -->
                <p style="margin-bottom: 50px;" class="lead">
                    by Admin
                </p>

                <!-- Preview Image -->
                <!-- <img class="img-responsive" src="tintuc/{{$tintuc->Hinh}}" alt=""> -->


                <!-- Post Content -->
                <p class="lead">
                    {!!$tintuc->NoiDung!!}
                </p>

                <hr>


            </div>

            <!-- Blog Sidebar Widgets Column -->

                @include('layout.menu')
                

        </div>
        <style type="text/css">

            .danh a:hover{
                color: white;
            }
        </style>
        <!-- /.row -->
    </div>
    </div>
    </div>
@endsection