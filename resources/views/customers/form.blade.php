

<div class="panel-body">

    <div class="form-group">
        <!-- Name Form Input -->
        <div class="form-group">
            {!! Form::label('name', 'Nome cliente', ['class' => 'col-md-3 col-xs-12 control-label']) !!}
            <div class="col-md-6 col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <span class="help-block">Scrivere qui il nome del cliente.</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <!-- Logo Form Input -->
        <div class="form-group">
            {!! Form::label('logo', 'Logo:', ['class' => 'col-md-3 col-xs-12 control-label']) !!}
            <div class="col-md-6 col-xs-12">
                {!! Form::file('logo',  array('id' => 'logo', 'class' => 'file-loading', 'data-show-upload' => 'false', 'accept' => 'image/*')) !!}

                @unless (empty($customer->logo))

                    {!! Form::hidden('logo', $customer->logo, ['id' => 'hiddenlogo']) !!}

                @endunless

                <span class="help-block">Carica il logo del cliente.</span>
            </div>
        </div>
    </div>

    <!--- Description Field --->
    <div class="form-group">
        {!! Form::label('description', 'Descrizione', ['class' => 'col-md-3 col-xs-12 control-label']) !!}
        <div class="col-md-6 col-xs-12">
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            <span class="help-block">Descrizione del lavoro svolto.</span>
        </div>
    </div>


    <!-- Services Form Input -->
    <div class="form-group">
        {!! Form::label('service_list', 'Servizi:', ['class' => 'col-md-3 col-xs-12 control-label']) !!}
        <div class="col-md-6 col-xs-12">
            {!! Form::select('service_list[]', $services, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
            <span class="help-block">Aggiungi i servizi svolti per questo cliente cliccando nel campo. Clicca sulla X per rimuoverlo.</span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Immagini che scorrono</label>
        <div class="col-md-6 col-xs-12">

            @include ('partials.krajeeinput')

            <span class="help-block">Immagini dello slider.</span>
        </div>
    </div>

    <div class="form-group">
        <!-- sito web Form Input -->
        <div class="form-group">
            {!! Form::label('web', 'Sito web', ['class' => 'col-md-3 col-xs-12 control-label']) !!}
            <div class="col-md-6 col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                    {!! Form::url('web', null, ['class' => 'form-control']) !!}
                </div>
                <span class="help-block">Scrivere qui il sito web del cliente comprensivo di http:// o https://.</span>
            </div>
        </div>
    </div>

</div>

<div class="panel-footer">

    {!! Form::submit($submitButtonText, ['onclick' => 'submitForms()', 'class' => 'btn btn-primary pull-right', 'id' => 'fai_upload']) !!}

</div>






