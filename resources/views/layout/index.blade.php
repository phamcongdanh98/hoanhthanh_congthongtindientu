<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Danh Pham</title>
    <base href="{{asset('')}}">

    <!-- Bootstrap Core CSS -->
    <link href="trangchu_asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="trangchu_asset/css/shop-homepage.css" rel="stylesheet">
    <link href="trangchu_asset/css/my.css" rel="stylesheet">
    @yield('css')


                <style type="text/css">
                .noikhoi{
                    border-left: #bfc0b8 1px solid;
                    border-right: #bfc0b8 1px solid;
                    border-bottom: #999 1px solid;
                    border-top: #999 1px solid;
                    }
                </style>
</head>

<body style="padding-top: 0px;background: #0769AD">
    <div class="container" style="border-width:10px;border-style:solid;border-color:black;padding: 15px 0px;width: 1200px;box-shadow: 0 5px 5px 5px #888;background: #FFFFFF;">

	@include('layout.header')

  	@yield('content')

    
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="trangchu_asset/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="trangchu_asset/js/bootstrap.min.js"></script>
    <script src="trangchu_asset/js/my.js"></script>

    @yield('script')
    <div class="botbody">
        

    </div>

    </div>
    @include('layout.footer')
</body>
<style type="text/css">
    .botbody{
            padding: 10px 10px 20px 10px;
            text-align: center;
    }
</style>

</html>





