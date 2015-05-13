@extends('app')
@section('metatag')
<meta name="description" content="{{ $metadescription }}">
<title>{{ $metatitle }}</title>
@stop


@section('carousel')
<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide One');"></div>
            <div class="carousel-caption">
                <h2>Caption 1</h2>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>
            <div class="carousel-caption">
                <h2>Caption 2</h2>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
            <div class="carousel-caption">
                <h2>Caption 3</h2>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</header>

@stop
@section('content')

<!-- Portfolio Section -->
<div class="row">
    <hr>

    @foreach( $services as $service )

    <div class="col-md-3 col-sm-6">
        <a href="{{ action('ServicesController@show', [$service->slug]) }}">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>{{ $service->name }}</h4>
            </div>
            <div class="panel-body">

                    <p>{{ $service->excerpt }}</p>


            </div>
        </div>
        </a>
    </div>
    @endforeach

</div>

@stop

