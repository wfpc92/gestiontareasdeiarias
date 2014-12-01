var tareaEliminarModal = function(self) {
    var form = $(self).parents("form");
    var nombreTarea = form.children("p").eq(0).text()
    $("<div>")
            .html("¿Está seguro de eliminar la Tarea: \"" + nombreTarea + "\"?")
            .dialog({
                title: "Eliminar Tarea",
                resizable: false,
                width: 500,
                modal: true,
                buttons: {
                    "Borrar Tarea": function() {
                        tareaEliminarAjax(form);
                        $(this).dialog("close");
                    },
                    Cancelar: function() {
                        $(this).dialog("close");
                    }
                }
            });
    return false;
};
var tareaEliminarAjax = function(self) {
    var form = $(self);
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/tarea/eliminarAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var borrar = data.borrar;
            var motivo = data.motivo;
            var idActividad = data.idActividad;
            var idTarea = data.idTarea;
            var progressBar = data.progressBar;
            //obtener la lista de tareas.
            var idTareaActual = "#tarea-view-" + idTarea;
            $("div").remove(idTareaActual);
            actualizarProgressBar(progressBar);
            tareaCerrar(null);
            var items = $("#tareas-" + idActividad + " .items > .view")
            if (items.length === 0) {
                $("#tareas-" + idActividad + " .items").text("No se encontraron resultados.");
            }
            return false;
        }
    };

    var selectores = {
        cargando: {
            div: $("#cargando-principal")
        },
        exito: {
            div: $("#exito-principal"),
            mensaje: "Tarea eliminada."
        },
        error: {
            div: $("#error-principal")
        }
    };

    templateAjax1(confAjax, selectores);
    return false;
};

var tareaEliminarPoolModal = function(self) {
    $("<div>")
            .html("¿Estas seguro que deseas eliminar esta Tarea?")
            .dialog({
                title: "Eliminar Tarea",
                resizable: false,
                width: 500,
                modal: true,
                buttons: {
                    "Borrar Tarea": function() {
                        tareaEliminarPoolAjax(self);
                        $(this).dialog("close");
                    },
                    Cancelar: function() {
                        $(this).dialog("close");
                    }
                }
            });
    return false;
};

var tareaEliminarPoolAjax = function(self) {
    var form = $(self).parents("form");
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/tarea/eliminarAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var borrar = data.borrar;
            var motivo = data.motivo;
            var idTarea = data.idTarea;
            var progressBar = data.progressBar;
            //obtener la lista de tareas.
            var idTareaActual = "#tarea-view-" + idTarea;
            $("div").remove(idTareaActual);
            actualizarProgressBar(progressBar);
            //tareaCerrar(null);
            return false;
        }
    };

    var selectores = {
        cargando: {
            div: $("#cargando-principal")
        },
        error: {
            div: $("#error-principal")
        }
    };

    templateAjax1(confAjax, selectores);
    return false;
};