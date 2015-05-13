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

<hr>
    @foreach( array_chunk($customers->all(), 4) as $row )
        <div class="row">
            <?php $i = 0 ?>
            @foreach( $row as $customer )
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default detailed-box-container" id="{{ $customer->id }}">
                    <div class="panel-heading">
                        <h4>{{ $customer->name }}</h4>
                    </div>
                    <div class="panel-body">

                            <img class="img-responsive img-portfolio img-hover" src="/clienti/{{ $customer->logo }}" alt="">

                    </div>
                </div>
            </div>
            <?php ++$i ?>
            @endforeach
        </div>
    @endforeach





@stop

@section('script_footer')
<script src="/js/portfolio.js"></script>
@endsection