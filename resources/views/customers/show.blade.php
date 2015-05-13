@section('content')



        <div class="col-md-8">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel data-interval="2000"">
                <!-- Indicators -->
               <ol class="carousel-indicators">
        @for ($i = 0; $i < count($slides); $i++)
        <li data-target="#myCarousel" data-slide-to="{{ $i }}"@if ( $i === 0 ) class="active"@endif></li>
        @endfor
    </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php $first = true; ?>
@foreach ( $slides as $slide )
<div class="item @if($first) active @endif">
                    <img class="img-responsive" src="/lavori/{{ $slide->filename }}" alt="">
                </div>
                    <?php $first = false; ?>
@endforeach
</div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <h3>{{ $customer->name }}</h3>
            <p>{{ $customer->description }}</p>
            @unless ($customer->services->isEmpty())
            <h3>Servizi</h3>
            <ul>
                @foreach ($customer->services as $service)
                    <li>{{ $service->name }}</li>
                @endforeach
            </ul>
            @endunless

            <h3>Cliente</h3>
            <p>{{ $customer->name }}</p>
            <p><a href="{{ $customer->web }}">{{-- */
                    $website = str_replace('http://', ' ', $customer->web);
                    $website = str_replace('https://', ' ', $website);
                    /* --}}{{ $website }}</a></p>
        </div>

<div class="clearfix"></div>
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>
