var registroTareaEliminarModal = function(self) {
    $("<div>")
            .html("¿Estas seguro que deseas eliminar este Registro?")
            .dialog({
                title: "Eliminar Registro",
                resizable: false,
                width: 500,
                modal: true,
                buttons: {
                    "Borrar Registro": function() {
                        registroTareaEliminarAjax(self);
                        $(this).dialog("close");
                    },
                    Cancelar: function() {
                        $(this).dialog("close");
                    }
                }
            });
    return false;
};
var registroTareaEliminarAjax = function(self) {
    var form = $(self).parents("form");
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/tarea/eliminarRegistroTareaAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var idTarea = data.idTarea;
            var idRegistroTarea = data.idRegistroTarea;
            $("#registro-tarea-view-" + idRegistroTarea).remove();
            var items = $("#lst-registro-tarea-" + idTarea + " .items > div");
            if (items.length === 0) {
                $("#lst-registro-tarea-" + idTarea + " .items").text("No se encontraron resultados.");
                console.log(idTarea)
                deshabilitarPausa(idTarea);
                habilitarPlay(idTarea);
            }
            actualizarDuracionTarea(idTarea);
        }
    };

    var selectores = {
        cargando: {
            div: $("#cargando-principal")
        },
        exito: {
            div: $("#exito-principal"),
            mensaje: "Registro de tiempo eliminado."
        },
        error: {
            div: $("#error-principal")
        }
    };

    templateAjax1(confAjax, selectores);
    return false;
};
