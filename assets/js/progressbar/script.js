$(function () {
    $("#uploadform").ajax({
        beforeSend: function () {
            $(".progress").show();
        },
        uploadProgress: function (event, position, total, percentComplete) {
            $(".progress-bar").width(percentComplete + '%');
        },
        success: function () {
            $(".progress").hide();
        },
        complete: function (response) {

        }
    });
    $(".progress").hide();
});


