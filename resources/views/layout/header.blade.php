
    <div class="container noikhoi">
        <img style="margin-bottom: 1px;width: 1140px;padding-top: 15px;" src="slide/top.jpg" alt="">

    <nav class="navbar navbar-inverse font3" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="foo"><a  class="navbar-brand font1 " href="trangchu">Home</a></div>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav font1 ">
                    <li class="font2">
                        <a href="gioithieu">Giới thiệu</a>
                    </li>
                    @foreach($loaitin as $lt)
                            @if(count($lt->tintuc)>0)
                                <li class="font2">
                                    <a href="{{route('loaitin',['id'=>$lt->id])}}">{{$lt->TenLoai}}</a>
                                </li>
                            @endif
                        @endforeach
                    <li>
                        <a style="a:hover{color: blue;}" href="lienhe">Liên hệ</a>
                    </li>
                    <li>
                        <a style="a:hover{color: blue;}" href="admin/dangnhap">Admin</a>
                    </li>

                </ul>
                </ul>
            </div>
            </div>

    <style type="text/css">
        .font1 {
            font-size: 16px;
            color: black;
        }
        .font3{
            width: 1140px;
        }
        .navbar-inverse .navbar-nav>li>a {
            color: black;
            }
        .navbar-inverse {
            background-color: #0EAAF6;
            border: none;
            }
        .nav>li>a {
          padding-left: 22px;
          padding-right: 22px;
            }    
        .navbar-inverse .navbar-brand  {
            color: black;
        }


    </style>
            

        </div>

    </nav>



