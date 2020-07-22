 @extends('layout.index') 


 @section('content') 

    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
        

            <div class="col-md-9 noikhoi">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Liên hệ</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
                        <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>
					    
                        <div class="break"></div>
					   	<h4><span class= "glyphicon glyphicon-home "></span> Địa chỉ : </h4>
                        <p>101 Mai Xuân Thưởng, Vĩnh Hải, Thành phố Nha Trang, Khánh Hòa 650000, Việt Nam </p>

                        <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                        <p>truongthongtienlienlac@gmail.com </p>

                        <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                        <p>0905755555</p>



                        <br><br>
                        <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
                        <div class="break"></div><br>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3898.4782732618683!2d109.19718731476337!3d12.283544991309935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317067fb4e284bd7%3A0x66bee30fdf4d2331!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBUaMO0bmcgdGluIExpw6puIGzhuqFj!5e0!3m2!1svi!2s!4v1585484678371!5m2!1svi!2s" width="800" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					   </div>
	            </div>
        	</div>
            @include('layout.menu')
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection

