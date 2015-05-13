@extends('admin')


@section('breadcrumb')
<li><a href="/index_customers">Lista Portfolio</a></li>
<li class="active">Aggiungi Case Portfolio</li>
@stop


@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><strong>Crea nuovo</strong> Portfolio</h3>
        <ul class="panel-controls">
            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
        </ul>
    </div>

    @include ('errors.list')

    {!! Form::open(['url' => 'customers', 'class' => 'form-horizontal', 'files'=>true]) !!}

        @include('customers.form', ['submitButtonText' => 'Aggiungi lavoro'])

    {!! Form::close() !!}

</div>

@stop

@section('footer')

<script src="/js/fileinput.min.js"></script>


<script>

    $('#tag_list').select2({
        placeholder: 'Scegli i servizi'
    });

</script>

@include('partials.krajeejs')




@endsection

