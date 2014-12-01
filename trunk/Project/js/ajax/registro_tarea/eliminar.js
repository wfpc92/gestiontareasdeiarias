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
            var idRegistroTarea = data.idRegistroTarea;
            $("#registro-tarea-view-" + idRegistroTarea).remove();
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