@extends('admin')


@section('breadcrumb')
    <li><a href="/index_casehistories">Lista Case history</a></li>
    <li class="active">Aggiungi Case history</li>
@stop


@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><strong>Crea un nuovo</strong> Case history</h3>
        <ul class="panel-controls">
            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
        </ul>
    </div>

    @include ('errors.list')

    {!! Form::open(['url' => 'index_casehistories', 'class' => 'form-horizontal', 'files'=>true]) !!}

        @include('casehistories.form', ['submitButtonText' => 'Aggiungi case history'])

    {!! Form::close() !!}

</div>

@stop

@section('footer')

<script src="/js/fileinput.min.js"></script>


@include('partials.krajeejs')



@endsection

