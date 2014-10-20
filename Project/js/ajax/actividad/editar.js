var actividadEditarFormAjax = function(self) {
    var form = $(self).parents("form");
    console.log(form);
    $.ajax({
        type: 'POST',
        url: $(form).attr('action') + '/editarFormAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var idActividad = data.idActividad;
            var htmlEditarForm = data.htmlEditarForm;
            $("#actividad-content-" + idActividad).html(htmlEditarForm);
        },
        error: function() {
            alert("ERROR: actividadEditarFormAjax conexion fallida");
        }
    });
    return false;
};

var actividadEditarAjax = function(self) {
    var form = $(self).parents("form");
    $.ajax({
        type: 'POST',
        url: $(form).attr('action') + '/editarAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var idActividad = data.idActividad;
            var htmlActividad = data.htmlActividad;
            $("#actividad-content-" + idActividad).html(htmlActividad);
        },
        error: function() {
            alert("ERROR: actividadEditarAjaxwq conexion fallida");
        }
    });
    return false;
};