var actividadEliminarModal = function(self) {
    var form = $(self).parents("form");
    var nombreActividad = form.children("div").eq(1).children("a").text();
    $("<div>")
            .html("¿Está seguro de eliminar la Actividad: \
                    \"" + nombreActividad + "\"? \
                    Si elimina la Actividad se eliminarán las \
                    tareas asociadas a ellas.")
            .dialog({
                title: "Eliminar Actividad",
                resizable: false,
                width: 500,
                modal: true,
                buttons: {
                    "Borrar Actividad": function() {
                        actividadEliminarAjax(form);
                        $(this).dialog("close");
                    },
                    Cancel: function() {
                        $(this).dialog("close");
                    }
                }
            });
    return false;
};

var actividadEliminarAjax = function(form) {
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/eliminarAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var borrar = data.borrar;
            var error = data.error;
            var idCategoria = data.idCategoria;
            var idActividad = data.idActividad;
            //obtener la lista de categorias.
            var idActividadActual = "#actividad-" + idActividad;
            $("div").remove(idActividadActual);
            var items = $("#actividades-" + idCategoria + " .items > .view")
            if (items.length === 0) {
                $("#actividades-" + idCategoria + " .items").text("No se encontraron resultados.");
            }
        }
    };

    var selectores = {
        cargando: {
            div: $("#cargando-principal")
        },
        exito: {
            div: $("#exito-principal"),
            mensaje: "Actividad Eliminada."
        },
        error: {
            div: form.find(".error")
        }
    };
    templateAjax1(confAjax, selectores);
    return false;
};