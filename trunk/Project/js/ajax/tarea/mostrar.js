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
        $(".botones").css("margin-right", "40px");
    }
    else {
        $("#content-princ-izq").css("width", "38%");
        $("#content-princ-der")
                .css("width", "58%")
                .show()
                .html(html);

        if ($("#content-princ-izq").width() <= 500) {
            $(".botones").css("float", "none")
                    .css("margin-left", "30px")
                    .css("margin-top", "0px");
            $(".form-tarea p").css("padding", "0 40px 10px 33px");
        } else {
            $(".botones").css("margin-right", "25%");
        }
    } 
    
    $anchoizq = $("#content-princ-izq").width();
    console.log($anchoizq);
    
    
};
