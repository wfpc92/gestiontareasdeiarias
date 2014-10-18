var tareaMostrarAjax = function(form) {

    $.ajax({
        type: 'POST',
        url: $(form).attr('action') + '/tarea/mostrarAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var htmlTareaEditar = data.htmlTareaEditar;
            var idActividad = data.idActividad;
            var idTarea = data.idTarea;

            if (idTarea) {
                mostrarPanelDerecho(htmlTareaEditar)
            }
        },
        error: function() {
            alert("ERROR: tareaMostrarAjax conexion fallida");
        }
    });
    return false;
};

var mostrarPanelDerecho = function(html) {
    $("#content-princ-izq").css("width", "38%");
    $("#content-princ-der")
            .css("width", "58%")
            .show()
            .html(html);
};
