var actividadListarTareasAjax = function(self) {
    var form = $(self).parents("form");
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/listarTareasAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var idActividad = data.idActividad;
            var htmlTareas = data.htmlTareas;
            var panel = $("#content-princ-izq");
            var progressBar = data.progressBar;
            panel.html(htmlTareas);
            actualizarProgressBar(progressBar);
            situacionPaneles1();
        }
    };
    var selectores = {
        divCargando: $("#cargando-principal"),
        divError: $("#error-principal")
    };
    templateAjax1(confAjax, selectores);
    return false;
}
      
      var situacionPaneles1 =
              function(){if ($(window).width() <= 700) {
                $("#contentIzq").hide();
                $("#contentDer").show();
            }}