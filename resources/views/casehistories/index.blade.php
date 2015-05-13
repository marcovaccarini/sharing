@extends('app')
@section('metatag')
<meta name="description" content="Descrizione pagina indice del Case history">
<title>Title per la pagina indice del Case history</title>
@stop

@section('content')

<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Case history
            <small> : Archivio</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/">Home</a>
            </li>
            <li class="active">Case history : Archivio</li>
        </ol>
    </div>
</div>
<!-- /.row -->

@foreach( $casehistories as $casehistory)

<!-- Project One -->
<div class="row">
    <div class="col-md-7">

        <a href="{{ action('CasehistoriesController@show', [$casehistory->slug]) }}">
            <img class="img-responsive img-hover" src="/lavori/{{ $casehistory->pictures{0}->filename }}" alt="">
        </a>
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


        <a class="btn btn-primary" href="{{ action('CasehistoriesController@show', [$casehistory->slug]) }}">View Case history</i></a>
    </div>
</div>
<!-- /.row -->

<hr>
@endforeach


<!-- Pagination -->
<!--
<div class="row text-center">
    <div class="col-lg-12">
        <ul class="pagination">
            <li>
                <a href="#">&laquo;</a>
            </li>
            <li class="active">
                <a href="#">1</a>
            </li>
            <li>
                <a href="#">2</a>
            </li>
            <li>
                <a href="#">3</a>
            </li>
            <li>
                <a href="#">4</a>
            </li>
            <li>
                <a href="#">5</a>
            </li>
            <li>
                <a href="#">&raquo;</a>
            </li>
        </ul>
    </div>
</div>
-->
<!-- /.row -->


@stop

