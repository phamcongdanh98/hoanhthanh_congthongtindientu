 @extends('layout.index')

 @section('content')
 <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
		@include('layout.slide')
        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
        	<!-- mennu -->
        	

            <div class="col-md-9 noikhoi">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Danh Mục Tin</h2>
	            	</div>

	            	<div style="box-shadow: 2px 4px 0px 0px #888;" class="panel-body">
	            		@foreach($loaitin as $lt)
	            			@if(count($lt->tintuc)>0)
			            		<!-- item -->
							    <div class="row-item row">
				                	<h3 >
				                		<a href="{{route('loaitin',['id'=>$lt->id])}}">{{$lt->TenLoai}}</a> 
				                	</h3>

				                	<?php 

				                		$data=$lt->tintuc->sortByDesc('id')->take(5);
				                		$tin1=$data->shift();

				                	 ?>

				                	<div class="col-md-8 border-right">
				                		<div class="col-md-5">
					                        <a href="tintuc/{{$tin1['id']}}">
					                            <img style="padding: 4px;border: #bfc0b8 1px solid;" class="img-responsive" src="tintuc/{{$tin1['Hinh']}}" alt="">
					                        </a>
					                    </div>
					                    <div style="margin-top: -2px;" class="col-md-7">
					                        <a href="tintuc/{{$tin1['id']}}"><h3 style="font-size: 18px;font-weight: bold;margin-top: 10px;">{{$tin1->TieuDe}}</h3></a>
					                        <p>{{$tin1->TomTat}}</p>
					                        <a class="btn btn-primary" href="tintuc/{{$tin1['id']}}">Xem<span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>

				                	</div>
									<div class="col-md-4">
										@foreach($data->all() as $tintuc)
										<a href="tintuc/{{$tintuc['id']}}">
											<h4>	
												<span class="glyphicon glyphicon-list-alt"></span>
												{{$tintuc['TieuDe']}}
											</h4>
										</a>
										@endforeach
									</div>	
									<div class="break"></div>
				                </div>
			                @endif
						@endforeach
					</div>
	            </div>
	            
        	</div>
        	@include('layout.menu')
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection