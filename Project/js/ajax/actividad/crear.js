var actividadCrearAjax = function(form) {
    var confAjax = {
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
            menus();
        }
    };

    var selectores = {
        cargando: {
            div: $("#cargando-principal")
        },
        exito: {
            div: $("#exito-principal")
        },
        error: {
            div: $(form).find(".error")
        }
    };

    templateAjax1(confAjax, selectores);
    return false;
};
