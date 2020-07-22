@extends('layout.index')

@section('content')
    <div class="container">
        <div style="margin-top: 45px;border-top: solid;" class="row">

            <!-- Blog Post Content Column -->
            <div style="border: solid;margin-top: 5px;padding: 0px 32px;" class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$thongbaotin->TieuDe}}</h1>

                <!-- Author -->
                <p class="lead">
                    By Admin
                </p>

                <!-- Preview Image -->


                <!-- Post Content -->
                <p class="lead">
                    {!!$thongbaotin->NoiDung!!}
                </p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
               
            </div>

            @include('layout.menu')
        

        </div>
        <!-- /.row -->
    </div>
@endsection

