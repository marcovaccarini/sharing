<div class="panel-body">
    <!-- Titolo Form Input -->
    <div class="form-group">
        {!! Form::label('titolo', 'Titolo:*', ['class' => 'col-md-3 col-xs-12 control-label']) !!}
        <div class="col-md-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                {!! Form::text('titolo', null, ['class' => 'form-control']) !!}
            </div>
            <span class="help-block">Obbligatorio. Scrivere qui il titolo del case history.</span>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('cliente', 'Cliente:', ['class' => 'col-md-3 col-xs-12 control-label']) !!}
        <div class="col-md-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                {!! Form::text('cliente', null, ['class' => 'form-control']) !!}
            </div>
            <span class="help-block">Scrivere qui il nome del cliente.</span>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('brand', 'Brand:', ['class' => 'col-md-3 col-xs-12 control-label']) !!}
        <div class="col-md-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                {!! Form::text('brand', null, ['class' => 'form-control']) !!}
            </div>
            <span class="help-block">Scrivere qui il nome del brand.</span>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('categoria', 'Categoria:', ['class' => 'col-md-3 col-xs-12 control-label']) !!}
        <div class="col-md-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                {!! Form::text('categoria', null, ['class' => 'form-control']) !!}
            </div>
            <span class="help-block">Scrivere qui il nome della categoria.</span>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('esigenza', 'Esigenza: ', ['class' => 'col-md-3 col-xs-12 control-label']) !!}
        <div class="col-md-6 col-xs-12">
            {!! Form::textarea('esigenza', null, ['class' => 'form-control']) !!}
            <span class="help-block">Esigenza del case history.</span>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('soluzione', 'Soluzione: ', ['class' => 'col-md-3 col-xs-12 control-label']) !!}
        <div class="col-md-6 col-xs-12">
            {!! Form::textarea('soluzione', null, ['class' => 'form-control']) !!}
            <span class="help-block">Soluzione del case history.</span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Immagini che scorrono*</label>
        <div class="col-md-6 col-xs-12">

            @include ('partials.krajeeinput')

            <span class="help-block">Immagini grandi.</span>
        </div>
    </div>



</div>

<div class="panel-footer">

    <!---  Field --->

    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary pull-right']) !!}
</div>