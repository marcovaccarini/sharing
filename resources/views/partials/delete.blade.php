<div style="position:absolute;left:9px;bottom:10px;">
    <!-- SIGN OUT -->
    <a href="#" class="btn btn-danger mb-control" data-box="#mb-delete"><i class="glyphicon glyphicon-trash"></i> Elimina</a>
    <!-- END SIGN OUT -->
</div>
<!-- DELETE MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-delete">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-trash-o"></span> <strong>Eliminare</strong>?</div>
            <div class="mb-content">
                <p>Sei sicuro di voler eliminare questo elemento?</p>
                <p>Clicca su No per uscire. Clicca su Si per eliminare.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <!--
                    <a href="#" class="btn btn-success btn-lg">Si</a>
                    -->
                    {!! Form::open(['method' => 'DELETE', 'action' => [$whichController, $idToDelete]]) !!}

                    {!! Form::submit('Si', ['class' => 'btn btn-danger btn-lg']) !!}
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
</div>
<!-- END DELETE MESSAGE BOX-->