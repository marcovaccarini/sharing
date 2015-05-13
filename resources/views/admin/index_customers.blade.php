@extends('admin')


@section('breadcrumb')

    <li class="active">Lista Portfolio</li>

@stop


@section('content')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span>Indice Portfolio</h2>
</div>

<button class="btn btn-success btn-block" onclick="location.href='/customers/create'"><span class="fa fa-plus"></span> Aggiungi un nuovo lavoro</button>


<div class="panel-body list-group border-bottom">
    @foreach( $customers as $customer )
    <a href="{{ action('CustomersController@edit', [$customer->id]) }}" class="list-group-item"><strong>{{
            $customer->name }}<strong></a>
    @endforeach
</div>
@stop