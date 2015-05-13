@extends('app')

@section('metatag')

<meta name="description" content="Descrizione pagina 404">
<title>Title per la pagina 404</title>

@stop


@section('content')


<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">404
            <small>Page Not Found</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/">Home</a>
            </li>
            <li class="active">404</li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">

    <div class="col-lg-12">
        <div class="jumbotron">
            <h1><span class="error-404">404</span>
            </h1>
            <p>The page you're looking for could not be found.</p>

        </div>
    </div>

</div>

<hr>

@stop