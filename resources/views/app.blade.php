<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    @yield('metatag')





    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

@include('partials.nav')

@yield('carousel')
<!-- Page Content -->
<div class="container">





@yield('content')




</div>
<!-- /.container -->

    <!--footer start-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3 address wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">
                    <h1>
                        contact info
                    </h1>
                    <address>
                        <p><i class="fa fa-home pr-10"></i>Address: No.XXXXXX street</p>
                        <p><i class="fa fa-globe pr-10"></i>Mars city, Country </p>
                        <p><i class="fa fa-mobile pr-10"></i>Mobile : (123) 456-7890 </p>
                        <p><i class="fa fa-phone pr-10"></i>Phone : (123) 456-7890 </p>
                        <p><i class="fa fa-envelope pr-10"></i>Email :   <a href="javascript:;">support@example.com</a></p>
                    </address>
                </div>
                <div class="col-lg-3 col-sm-3 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">
                    <h1>Ultimi casehistories</h1>
                    <div class="tweet-box">
                        <div class="wrap-tweet-box">

                            @foreach( $otherCasehistories as $otherCasehistory)
                                <a class="pull-left" style="margin: 6px;" href="/casehistories/{{ $otherCasehistory->slug }}">
                                    <img width="64" class="media-object" src="/lavori/thumbnail/{{ $otherCasehistory->pictures{0}->filename }}" alt="">
                                 </a>
                            @endforeach

                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="col-lg-3 col-sm-3">
                    <div class="page-footer wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                        <h1>
                            Our Company
                        </h1>
                        <ul class="page-footer-list">
                            <li>
                                <i class="fa fa-angle-right"></i>
                                <a href="/about">About</a>
                            </li>
                            <li>
                                <i class="fa fa-angle-right"></i>
                                <a href="/metodo">Metodo</a>
                            </li>

                            <li>
                                <i class="fa fa-angle-right"></i>
                                <a href="/customers">Portfolio</a>
                            </li>
                            <li>
                                <i class="fa fa-angle-right"></i>
                                <a href="/casehistories">Case histories</a>
                            </li>
                            <li>
                                <i class="fa fa-angle-right"></i>
                                <a href="/contatti">Contatti</a>
                            </li>
                            <!--
                            <li>
                                <i class="fa fa-angle-right"></i>
                                <a href="career.html">We are Hiring</a>
                            </li>
                            <li>
                                <i class="fa fa-angle-right"></i>
                                <a href="terms.html">Term & condition</a>
                            </li>
                            -->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <div class="text-footer wow fadeInUp" data-wow-duration="2s" data-wow-delay=".7s">
                        <h1>
                            Text Widget
                        </h1>
                        <p>
                            This is a text widget.Lorem ipsum dolor sit amet.
                            This is a text widget.Lorem ipsum dolor sit amet.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->



<!-- jQuery -->
<script src="/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>
@yield('script_footer')
<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>


</body>

</html>