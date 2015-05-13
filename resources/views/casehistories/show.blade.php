@extends('app')
@section('metatag')
<meta name="description" content="{{ $metadescription }}">
<title>{{ $casehistory->titolo }}</title>
@stop

@section('content')

<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ $casehistory->titolo }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="/">Home</a>
            </li>
            <li><a href="/casehistories">Case history</a>
            </li>
            <li class="active">{{ $casehistory->titolo }}</li>
        </ol>
    </div>
</div>
<!-- /.row -->



<!-- Project One -->
<div class="row">
    <div class="col-md-7">
        @foreach ( $pictures as $picture )
            <img class="img-responsive img-hover" src="/lavori/{{ $picture->filename }}" alt="">
            <br>
        @endforeach
    </div>
    <div class="col-md-5">
        <h3>{{ $casehistory->titolo }}</h3>
        @unless (empty($casehistory->cliente))
            <h4><b>Cliente: </b> {{ $casehistory->cliente }}</h4>
        @endunless

        @unless (empty($casehistory->brand))
            <h4><b>Brand: </b> {{ $casehistory->brand }}</h4>
        @endunless

        @unless (empty($casehistory->categoria))
            <h4><b>Categoria: </b> {{ $casehistory->categoria }}</h4>
        @endunless

        <p><b>Esigenza: </b><br> {{ $casehistory->esigenza }}</p>
        <p><b>Soluzione: </b><br> {{ $casehistory->soluzione }}</p>
        <br>
<h4>Ultimi casehistories</h4>
        @foreach( $otherCasehistories as $otherCasehistory)
        <a class="pull-left" style="margin: 6px;" href="/casehistories/{{ $otherCasehistory->slug }}">
            <img class="media-object" src="/lavori/thumbnail/{{ $otherCasehistory->pictures{0}->filename }}" alt="">
        </a>
        @endforeach
        <div class="clearfix"></div>
        <br>

        <h4><a href="/casehistories">Archivio</a></h4><p>Visualizza altri case history di successo</p>

    </div>
</div>
<!-- /.row -->

<hr>






@stop

