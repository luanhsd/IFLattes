$("#progress").hide();
$('#submitzip').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, 500);
   $("#submit").click();
    e.preventDefault();
});

$('#submit').change(function (e) {

    $("#uploadform").submit();
    e.preventDefault();

});


$('#uploadform').submit(function (e) {

    var formData = new FormData(this);
    $("#progress").show();
    $.ajax({
        type: 'POST',
        url: 'zip/',
        data: formData,
        xhr: function () {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
                myXhr.upload.addEventListener('progress', progress, false);
            }
            return myXhr;
        },
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            //console.log(data);
        },
        error: function (data) {
            //console.log(data);
        }
    });
    e.preventDefault();

});


function progress(e) {
    var progressbar = document.getElementById("progressbar");
    if (e.lengthComputable) {
        var max = e.total;
        var current = e.loaded;

        var Percentage = (current * 100) / max;
        progressbar.style.width = Percentage + '%';
        
        if (Percentage >= 100)
        {       
            jQuery('#panel-zip').prepend("<div class='alert alert-dismissable alert-success'>Arquivos inseridos para fila de processamento<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button></div>");
        }
        
    }
}
