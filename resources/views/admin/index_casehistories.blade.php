@extends('admin')


@section('breadcrumb')


    <li class="active">Lista Case history</li>


@stop

@section('content')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span>Indice case history</h2>
</div>

<button class="btn btn-success btn-block" onclick="location.href='/casehistories/create'"><span class="fa fa-plus"></span> Aggiungi una nuova case history</button>


<div class="panel-body list-group border-bottom">
    @foreach( $casehistories as $casehistory )
    <a href="{{ action('CasehistoriesController@edit', [$casehistory->id]) }}" class="list-group-item"><strong>{{
            $casehistory->titolo }}<strong></a>
    @endforeach
</div>
@stop

