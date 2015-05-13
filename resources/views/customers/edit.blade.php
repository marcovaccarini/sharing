@extends('admin')


@section('breadcrumb')
    <li><a href="/index_customers">Lista Portfolio</a></li>
    <li class="active">Modifica Case Portfolio</li>
@stop


@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Modifica Portofolio <strong>{{ $customer->name }}</strong></h3>
        <ul class="panel-controls">
            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
        </ul>
    </div>

    @include ('errors.list')

    {!! Form::model($customer, ['method' => 'PATCH', 'action' => ['CustomersController@update', $customer->id], 'class' => 'form-horizontal', 'files' => true]) !!}
        @include('customers.form', ['submitButtonText' => 'Aggiorna lavoro'])
    {!! Form::close() !!}

    @include('partials.delete', ['whichController' => 'CustomersController@destroy', 'idToDelete' => $customer->id])

</div>

@stop


@section('footer')

<script src="/js/fileinput.min.js"></script>

<script>
    $('#tag_list').select2({
        placeholder: 'Scegli i servizi'
    });

    $.ajaxSetup(
        {
            headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
        });
    $(document).on("ready", function() {



        $("#logo").fileinput({
           // uploadUrl: "/site/file-upload-batch?type=1",
            uploadAsync: false,
           // minFileCount: 0,
            maxFileCount: 1,
            previewFileType: "image",
            //showRemove: false,
            mainClass: "input-group-lg",
            browseLabel: "Scegli il logo",
            browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
            overwriteInitial: true,
            @unless (empty($customer->logo))
                initialPreview: [
                    "<img src='/clienti/{{ $customer->logo }}'>",
                ],
            @endunless
            initialPreviewConfig: [
                {caption: "{{ $customer->logo }}", width: '100px', url: "/logodelete", key: {{ $customer->id }} },
    ],

    });
    $("#logo").on("filepredelete", function(jqXHR) {

        var abort = true;
        if (confirm("Sei veramente sicuro di voler eliminare questa immagine?")) {
            abort = false;
            $('#hiddenlogo').remove();


        }
        return abort;
    });



    $("#slides").fileinput({
        // uploadUrl: "/site/file-upload-batch?type=1",
        uploadAsync: false,
        minFileCount: 0,
        maxFileCount: 100,
        previewFileType: "image",
        showRemove: false,
        mainClass: "input-group-lg",


        browseLabel: "Scegli le slides",
        browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
        overwriteInitial: false,



    initialPreview: [
            @foreach ( $slides as $slide )
                            "<img src='/lavori/thumbnail/{{ $slide->filename }}'>",
            @endforeach
        ],
        initialPreviewConfig: [
    @foreach ( $slides as $slide )
            {caption: "{{ $slide->filename }}", width: "100px", url: "/slidesdelete", key: {{ $slide->id }} },
    @endforeach
    ],

    });
    $("#slides").on("filepredelete", function(jqXHR) {

        var abort = true;
        if (confirm("Sei veramente sicuro di voler eliminare questa immagine?")) {
            abort = false;

        }
        return abort;
    });




    }); //  fine ondoucmentready





</script>




@endsection

