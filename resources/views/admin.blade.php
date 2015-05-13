<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META SECTION -->
    <title>Joli Admin - Responsive Bootstrap Admin Template</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="/admin/favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="/admin/css/theme-default.css"/>

    <!-- EOF CSS INCLUDE -->

    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/css/select2.min.css" rel="stylesheet" />

    <!-- Dropzone   -->
    <link href="/css/basic.css" type="text/css" rel="stylesheet" />
    <link href="/css/all-krajee.css" type="text/css" rel="stylesheet" />



</head>
<body>
<!-- START PAGE CONTAINER -->

    <div class="page-container page-navigation-top">


    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        <ul class="x-navigation x-navigation-horizontal">
            <li class="xn-logo">
                <a href="/my-admin">SHARING</a>
                <a href="#" class="x-navigation-control"></a>
            </li>
            <li class="xn-openable">
                <a href="/index_customers"><span class="fa fa-list"></span> <span class="xn-text">Lista Portfolio</span></a>
            </li>
            <li class="xn-openable">
                <a href="/customers/create"><span class="fa fa-plus-square-o"></span> <span class="xn-text">Aggiungi Portfolio</span></a>
            </li>
            <li class="xn-openable">
                <a href="/index_casehistories"><span class="fa fa-list"></span> <span class="xn-text">Lista Case history</span></a>
            </li>
            <li class="xn-openable">
                <a href="/casehistories/create"><span class="fa fa-plus-square-o"></span> <span class="xn-text">Aggiungi Case history</span></a>
            </li>
            <!-- SIGN OUT -->
            <li class="xn-icon-button pull-right">
                <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
            </li>
            <!-- END SIGN OUT -->

        </ul>
        <!-- END X-NAVIGATION VERTICAL -->


        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="/my-admin">Home</a></li>
        @yield('breadcrumb')
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            @include ('flash::message')

<script>
    //$('div.alert').not('.alert-important').delay(3000).slideUp(300);
    //$('#flash-overlay-modal').modal();

</script>



            <div class="row">
                <div class="col-md-12">
                    @yield('content')


                </div>
            </div>

        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Sei sicuro di voler uscire?</p>
                <p>Clicca su No per restare. Clicca su Si per uscire.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="{{ url('/auth/logout') }}" class="btn btn-success btn-lg">Si</a>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->


<!-- START PRELOADS -->
<audio id="audio-alert" src="/admin/audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="/admin/audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="/admin/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/admin/js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="/admin/js/plugins/bootstrap/bootstrap.min.js"></script>
<!-- END PLUGINS -->

<!-- THIS PAGE PLUGINS -->
<script type='text/javascript' src='/admin/js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="/admin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

<script type="text/javascript" src="/admin/js/plugins/bootstrap/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/admin/js/plugins/bootstrap/bootstrap-file-input.js"></script>
<script type="text/javascript" src="/admin/js/plugins/bootstrap/bootstrap-select.js"></script>
<script type="text/javascript" src="/admin/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<!-- END THIS PAGE PLUGINS -->


<!-- THIS PAGE PLUGINS -->


<!--
<script type="text/javascript" src="/admin/js/plugins/dropzone/dropzone.min.js"></script>
-->
<script type="text/javascript" src="/admin/js/plugins/fileinput/fileinput.min.js"></script>
<script type="text/javascript" src="/admin/js/plugins/filetree/jqueryFileTree.js"></script>
<!-- END PAGE PLUGINS -->


<!-- START TEMPLATE -->


<script type="text/javascript" src="/admin/js/plugins.js"></script>
<script type="text/javascript" src="/admin/js/actions.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/js/select2.min.js"></script>


<!-- END TEMPLATE -->
<!-- END SCRIPTS -->
@yield('footer')
</body>
</html>