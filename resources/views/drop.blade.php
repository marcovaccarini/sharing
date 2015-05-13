<html>

<head>

    <!-- 1 -->
    <link href="/css/basic.css" type="text/css" rel="stylesheet" />
    <link href="/css/dropzone.css" type="text/css" rel="stylesheet" />

    <!-- 2 -->
    <script src="/js/dropzone.js"></script>

</head>

<body>
<style>
    .dropzone-previews {
        height: auto;
        width: 500px;
        border: dashed 1px red;
        background-color: lightblue;
    }
    .dz-remove{color:red;}
</style>
<form id="my-awesome-dropzone" class="dropzone" style="border:0;" method="POST" enctype="multipart/form-data" action="{{URL::to('customers/create')}}">
    <input name="_token" type="hidden" value="{{ csrf_token() }}">
     <!-- this is were the previews should be shown. -->



    <input type="text" name="name" />

    <div class="dropzone dropzone-previews clickable">
        <div class="dz-message" data-dz-message>
            <span>Clicca qui per caricare le immagini</span>
        </div>
    </div>





    <!-- Now setup your input fields -->


    <input type="text" name="service_list" />

    <button type="submit">Submit data and files!</button>
</form>

<script>





    Dropzone.options.myAwesomeDropzone = { // The camelized version of the ID of the form element

        // The configuration we've talked about above
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 100,
        maxFiles: 100,
        //previewsContainer: "#previews", // Define the container to display the previews
        previewsContainer: ".dropzone-previews",
        // You probably don't want the whole body
        // to be clickable to select files
        clickable: ".clickable",


        //addRemoveLinks: true,



        // The setting up of the dropzone
        init: function() {
            var myDropzone = this;

            // First change the button to actually tell Dropzone to process the queue.
            this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                // Make sure that the form isn't actually being sent.
                e.preventDefault();
                e.stopPropagation();
                myDropzone.processQueue();
            });

            // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
            // of the sending event because uploadMultiple is set to true.
            this.on("sendingmultiple", function() {
                // Gets triggered when the form is actually being sent.
                // Hide the success button or the complete form.
            });
            this.on("successmultiple", function(files, response) {
                // Gets triggered when the files have successfully been sent.
                // Redirect user or notify of success.
            });
            this.on("errormultiple", function(files, response) {
                // Gets triggered when there was an error sending the files.
                // Maybe show form again, and notify user of error
            });
            this.on("addedfile", function(file) {

                // Create the remove button
                var removeButton = Dropzone.createElement("<button>Elimina il file</button>");


                // Capture the Dropzone instance as closure.
                var _this = this;

                // Listen to the click event
                removeButton.addEventListener("click", function(e) {
                    // Make sure the button click doesn't submit the form:
                    e.preventDefault();
                    e.stopPropagation();

                    // Remove the file preview.
                    _this.removeFile(file);
                    // If you want to the delete the file on the server as well,
                    // you can do the AJAX request here.
                });

                // Add the button to the file preview element.
                file.previewElement.appendChild(removeButton);
            });


        }

    }

</script>
</body>

</html>












<!--
<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>jQuery plugin for FileAPI</title>


    <script src="js/dropzone.js"></script>
    <link rel="stylesheet" href="css/dropzone.css">
</head>
<body>
<form id="my-awesome-dropzone" class="dropzone">
    <div class="dropzone-previews"></div>


    <input type="email" name="username" />
    <input type="password" name="password" />

    <button type="submit">Submit data and files!</button>
</form>

<script>

    Dropzone.options.myAwesomeDropzone = { // The camelized version of the ID of the form element

        // The configuration we've talked about above
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 100,
        maxFiles: 100,

        // The setting up of the dropzone
        init: function() {
            var myDropzone = this;

            // First change the button to actually tell Dropzone to process the queue.
            this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                // Make sure that the form isn't actually being sent.
                e.preventDefault();
                e.stopPropagation();
                myDropzone.processQueue();
            });

            // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
            // of the sending event because uploadMultiple is set to true.
            this.on("sendingmultiple", function() {
                // Gets triggered when the form is actually being sent.
                // Hide the success button or the complete form.
            });
            this.on("successmultiple", function(files, response) {
                // Gets triggered when the files have successfully been sent.
                // Redirect user or notify of success.
            });
            this.on("errormultiple", function(files, response) {
                // Gets triggered when there was an error sending the files.
                // Maybe show form again, and notify user of error
            });
        }

    }

</script>
</body>
</html>
-->