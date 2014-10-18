
var tareaEliminarAjax = function(self, event) {
    var form = $(self).parent("form");
    $.ajax({
        type: 'POST',
        url: $(form).attr('action') + '/tarea/eliminarAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var borrar = data.borrar;
            var motivo = data.motivo;
            var idTarea = data.idTarea;
            //obtener la lista de tareas.
            var idTareaActual = "#tarea-view-" + idTarea;
            $("div").remove(idTareaActual);
            tareaCerrar(null);
            return false;
        },
        error: function() {
            alert("ERROR: tareaEliminarAjax conexion fallida");
        }
    });
    //event.preventDefault();
    return false;
};

