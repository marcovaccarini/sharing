@extends('admin')

@section('breadcrumb')


    <li><a href="/index_casehistories">Lista Case history</a></li>
    <li class="active">Modifica Case history</li>


@stop



@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><strong>Modifica</strong> Case history {{ $casehistory->titolo }}</h3>
        <ul class="panel-controls">
            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
        </ul>
    </div>

    @include ('errors.list')

    {!! Form::model($casehistory, ['method' => 'PATCH', 'action' => ['CasehistoriesController@update', $casehistory->id], 'class' => 'form-horizontal', 'files'=>true]) !!}

        @include('casehistories.form', ['submitButtonText' => 'Aggiorna case history'])

    {!! Form::close() !!}

    @include('partials.delete', ['whichController' => 'CasehistoriesController@destroy', 'idToDelete' => $casehistory->id])

</div>
@stop


@section('footer')

<script src="/js/fileinput.min.js"></script>

<script>
    $.ajaxSetup(
        {
            headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
        });
    $(document).on("ready", function() {



        $("#slides").fileinput({
            // uploadUrl: "/site/file-upload-batch?type=1",
            uploadAsync: false,
            minFileCount: 0,
            maxFileCount: 100,
            previewFileType: "image",
            showRemove: true,
            mainClass: "input-group-lg",


            browseLabel: "Scegli le slides",
            browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
            overwriteInitial: false,
            initialPreview: [
        @foreach ( $pictures as $picture )
        "<img src='/lavori/thumbnail/{{ $picture->filename }}'>",
        @endforeach
        ],
        initialPreviewConfig: [
        @foreach ( $pictures as $picture )
        {caption: "{{ $picture->filename }}", width: "120px", url: "/picturedelete", key: {{ $picture->id }} },
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
