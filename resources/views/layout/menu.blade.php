<div class="menutop">
            <div style="margin-top: 5px;" class="col-md-3 ">
                <ul class="list-group" id="menu">  
                <form action="timkiem" method="post">
                    @csrf
                    <div class="form-group">
                      <input type="text" name="tukhoa" class="form-control" placeholder="Tìm kiếm">
                    </div>
                    <button type="submit" class="btn btn-default">Tìm</button>
                </form>
                </ul>
                <ul class="list-group" id="menu">
                    
                    <li style="background-color: #b81515;font-weight: bold;font-size: 17px;" href="#" class="list-group-item menu1 active fontt">
                    	Thông báo chính
                        </li>
                        <div style="margin-bottom: 105px;" class="box11">
                <marquee direction="up" height="100%" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();">
                        @foreach($thongbao as $tb)
                            
                                <li class="list-group-item ">
                                    <a href="thongbaotin/{{$tb['id']}}">{{$tb->TieuDe}}</a>
                                </li>
                        @endforeach
               </marquee>
               </div>
                </ul>
                <ul class="list-group" id="menu">
                    
                    <li style="background-color: #b81515;font-weight: bold;font-size: 17px;" href="#" class="list-group-item menu1 active">
                        Video Giới Thiệu
                        </li>
                    <div class="box11">
                <iframe style="padding: 0px 5px;" width="100%" src="https://www.youtube.com/embed/dwqZaJh3VIY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
               </div>
                </ul>
            
            </div>

            <style type="text/css">
                .list-group-item{
                    background: none;
                    border: none;
                }
                .box11{
                    border-left: #bfc0b8 1px solid;
                    border-right: #bfc0b8 1px solid;
                    border-bottom: #999 1px solid;
                    box-shadow: 4px 5px 4px 0px #888;
                }
            </style>
 </div>
