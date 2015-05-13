@extends('admin')


@section('breadcrumb')
    <li class="active">Benvenuto</li>
@stop

@section('content')






    <!-- TILES -->
    <div class="row">


        <div class="col-md-4">
            <a href="/index_customers" class="tile tile-warning tile-valign">Portfolio
                <div class="informer informer-default dir-bl"><span class="fa fa-list"></span> Indice Portfolio inseriti</div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="/index_casehistories" class="tile tile-danger tile-valign">Case history
                <div class="informer informer-default dir-bl"><span class="fa fa-list"></span> Indice Case history inseriti</div>
            </a>
        </div>

    </div>
<div class="row">
    <div class="col-md-4">
        <a href="/customers/create" class="tile tile-info">
            Aggiungi
            <p>Portfolio</p>
            <div class="informer informer-default dir-tr"><span class="fa fa-plus-square-o"></span></div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="/casehistories/create" class="tile tile-danger">
            Aggiungi
            <p>Case history</p>
            <div class="informer informer-default dir-tr"><span class="fa fa-plus-square-o"></span></div>
        </a>
    </div>
</div>
    @stop
