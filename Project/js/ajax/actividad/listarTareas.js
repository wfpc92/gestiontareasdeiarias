var actividadListarTareasAjax = function(form) {
    $.ajax({
        type: 'POST',
        url: $(form).attr('action'),
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var idActividad = data.idActividad;
            var htmlTareas = data.htmlTareas;
            var panel = $("#content-princ-izq");
            console.log(panel)
            panel.html(htmlTareas);
        },
        error: function() {
            alert("ERROR: actividadListarTareasAjax conexion fallida");
        }
    });
    return false;
}
      