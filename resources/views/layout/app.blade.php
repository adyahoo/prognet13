<!DOCTYPE html>
<!-- <<<<<<< HEAD -->
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('fresh/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('fresh/images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('fresh/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('fresh/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('fresh/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('fresh/css/custom.css')}}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start Main Top -->
    @include('layout.top')
    <!-- End Main Top -->

    <!-- Start Main Top -->
    @include('layout.header')
    <!-- End Main Top -->

    <!-- Start Top Search -->
    
    <!-- End Top Search -->

    <!-- Start Slider -->
    @yield('content')
    <!-- End Blog  -->


    <!-- Start Instagram Feed  -->
    @include('layout.ins')
    <!-- End Instagram Feed  -->


    <!-- Start Footer  -->
    @include('layout.footer')
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="{{asset('https://html.design/')}}">html design</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <script src="{{asset('js/app.js')}}"></script>
    <!-- ALL JS FILES -->
    <script src="{{asset('fresh/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('fresh/js/popper.min.js')}}"></script>
    <script src="{{asset('fresh/js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('fresh/js/jquery.superslides.min.js')}}"></script>
    <script src="{{asset('fresh/js/bootstrap-select.js')}}"></script>
    <script src="{{asset('fresh/js/inewsticker.js')}}"></script>
    <script src="{{asset('fresh/js/bootsnav.js')}}"></script>
    <script src="{{asset('fresh/js/images-loded.min.js')}}"></script>
    <script src="{{asset('fresh/js/isotope.min.js')}}"></script>
    <script src="{{asset('fresh/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('fresh/js/baguetteBox.min.js')}}"></script>
    <script src="{{asset('fresh/js/form-validator.min.js')}}"></script>
    <script src="{{asset('fresh/js/contact-form-script.js')}}"></script>
    <script src="{{asset('fresh/js/custom.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="province_to"]').on('change', function(){
                var cityId = $(this).val();
                if(cityId){
                    $.ajax({
                        url: '/getCity/ajax/'+cityId,
                        type: "GET",
                        dataType: "json",
                        success: function(data){
                            $('select[name="destination"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="destination"]').append(
                                    '<option value="'+ key + '">'+value+'</option>');
                            }); 
                        }
                    });
                }else{
                    $('select[name="destination"]').empty();
                }
            });    
        });
    </script>
</body>

</html>