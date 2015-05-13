<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/home">SHARING</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chi siamo <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/about">Intro</a>
                        </li>
                        <li>
                            <a href="/metodo">Metodo</a>
                        </li>
                        <li>
                            <a href="#">...........</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="/services" class="dropdown-toggle" data-toggle="dropdown">Servizi <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        @foreach( $servicesMenu as $serviceMenu )
                            <li>
                                {!! link_to_action('ServicesController@show', $serviceMenu->name, [$serviceMenu->slug]) !!}
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="/customers">Portfolio</a>
                </li>
                @foreach( $navigationLatestCasehistories as $navigationLatestCasehistory )
                <li>
                    {!! link_to_action('CasehistoriesController@show', 'Case histories', [$navigationLatestCasehistory->slug]) !!}
                </li>
                @endforeach
                <li>


                    <!--
                    <a href="/casehistories">Case histories</a>
                    -->
                </li>
                <li>
                    <a href="/contatti">Contatti</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>