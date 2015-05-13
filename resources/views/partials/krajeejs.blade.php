<script>

    $(document).on("ready", function() {
        $("#logo").fileinput({
            previewFileType: "image",
            //browseClass: "btn btn-success",
            browseLabel: "Scegli il logo",
            browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
            removeClass: "btn btn-danger",
            removeLabel: "Delete",
            removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> ",
            uploadClass: "btn btn-info",
            uploadLabel: "Upload",
            uploadIcon: "<i class=\"glyphicon glyphicon-upload\"></i> ",
            mainClass: "input-group-lg"
        });


        $("#slides").fileinput({
            previewFileType: "image",
            //browseClass: "btn btn-success",
            browseLabel: "Scegli le immagini",
            browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
            removeClass: "btn btn-danger",
            removeLabel: "Delete",
            removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> ",
            uploadClass: "btn btn-info",
            uploadLabel: "Upload",
            uploadIcon: "<i class=\"glyphicon glyphicon-upload\"></i> ",
            mainClass: "input-group-lg"
        });
    }); //  fine ondoucmentready
</script>