var tareaMostrarAjax = function(self) {
    var form = $(self).parent("form");
    console.log(form)
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
    $ancho =  $(window).width();
    
    if ($ancho <= 1200) {
        $("#content-princ-izq").css("width", "100%");
        $("#content-princ-der")
                .css("width", "100%")
                .show()
                .html(html);
    }
    else {
        $("#content-princ-izq").css("width", "38%");
        $("#content-princ-der")
                .css("width", "58%")
                .show()
                .html(html);
    }    
};
