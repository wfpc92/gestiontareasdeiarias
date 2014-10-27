
var tareaEliminarAjax = function(self) {
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
            tareaCerrar(null);
            return false;
        }
    };
    var selectores = {
        divCargando: $("#cargando-principal"),
        divError: $("#error-principal")
    };
    templateAjax1(confAjax, selectores);
    return false;
};

