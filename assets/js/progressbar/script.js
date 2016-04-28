$("#submit").click(function (e) {
    $('html, body').animate({scrollTop: 0}, 'fast');
    $("#submit").click();
    e.preventDefault();
});

$('#submit').change(function (e) {

    $("#uploadform").submit();
    e.preventDefault();

});

$('#uploadform').submit(function (e) {

    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: 'Curriculo/',
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
            console.log(data);
        },
        error: function (data) {
            console.log(data);
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
        console.log(Percentage);
        progressbar.style.width = Percentage + '%';

        if (Percentage >= 100)
        {
        }
    }
}