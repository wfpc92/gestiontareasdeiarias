var actividadCrearAjax = function(form) {
    $.ajax({
        type: 'POST',
        url: $(form).attr('action'),
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var idCategoria = data.idCategoria;
            var htmlActividad = data.htmlActividad;
            var items = $("#categoria-" + idCategoria + " .list-view .items");
            var divsItems = $("#categoria-" + idCategoria + " .list-view .items > div");
            if (divsItems.length === 0) {
                items.html("");
            }
            items.append(htmlActividad);
            $("#txt-actividad-" + idCategoria).val("");
        },
        error: function() {
            alert("ERROR: actividadCrearAjax conexion fallida");
        }
    });
    return false;
};
