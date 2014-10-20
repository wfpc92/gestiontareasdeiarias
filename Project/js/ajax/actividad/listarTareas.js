var actividadListarTareasAjax = function(self) {
    var form = $(self).parents("form");
    $.ajax({
        type: 'POST',
        url: $(form).attr('action') + '/listarTareasAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var idActividad = data.idActividad;
            var htmlTareas = data.htmlTareas;
            var panel = $("#content-princ-izq");
            panel.html(htmlTareas);
        },
        error: function() {
            alert("ERROR: actividadListarTareasAjax conexion fallida");
        }
    });
    return false;
}
      