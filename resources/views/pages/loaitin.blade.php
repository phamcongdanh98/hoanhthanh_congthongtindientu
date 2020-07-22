 @extends('layout.index')  

 @section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        
                        <h4><b>{{$loaitin1->TenLoai}}</b></h4>
                    </div>
                    @foreach($tintuc as $tt)
                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="tintuc/{{$tt['id']}}">
                                <br>
                                <img style="padding: 4px;border: #bfc0b8 1px solid;" width="200px" height="200px" class="img-responsive" src="tintuc/{{$tt->Hinh}}" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <a href="tintuc/{{$tt['id']}}"><h3>{{$tt->TieuDe}}</h3></a>
                            <p>{{$tt->TomTat}}</p>
                            <a class="btn btn-primary" href="tintuc/{{$tt['id']}}">Xem<span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    @endforeach
                   
                    <!-- Pagination -->
                    {{$tintuc->links()}};
                    <!-- /.row -->

                </div>
            </div> 
            @include('layout.menu')

        </div>

    </div>
@endsection