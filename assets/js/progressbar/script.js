$(function () {
    var inputFile = $('input:file');
    var uploadURI = $('#uploadform').attr('action');
    var progressBar = $('#progressbar');
    var data = new formData();

    $('#submit').on('click', function (event) {
        var FilesToUpload = inputFile[0].files;
        if (FilesToUpload.length > 0) {
            for (var i = 0; i < FilesToUpload.length; i++) {
                console.log('oi');
                var file = FilesToUpload[i];
                data.append("file[]", file, file.name);
            }

            $.ajax({
                url: uploadURI,
                type: 'post',
                data: data,
                processData: false,
                contentType: false,
                success: function () {
                },
                xhr: function () {
                    var xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener(".progress-bar", function (event) {
                        if (event.lengthComputable) {
                            var percentComplete = Math.round((event.loaded / event.total) * 100);
                            console.log(percentComplete);

                            $('.progress-bar').show();
                            progressBar.css({width: percentComplete + "%"});
                        }
                        ;
                    }, false);

                    return xhr;
                }
            });
        }
    });
});