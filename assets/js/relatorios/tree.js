function graphs() {
    var element = document.getElementsByName("view");
    $(element).click(function () {
        var id = this.id;
        switch (id) {
            case 'qtd-titulacao':
                var url = "/IFLattes/Relatorios/getQTDTitulacao";
                var id = 'graph_titulacao';
                break;
        }

        $.ajax({
            url: url,
            dataType: "json",
            success: function (data) {
                var result = Array();
                for (var i = 0; i < data.length; i++) {
                    result[i] = {Name: data[i].nivel, Spent: data[i].qtd};
                }
                console.log(result);

            }
        }
        );

    });
}