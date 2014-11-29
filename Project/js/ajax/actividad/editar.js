var actividadEditarFormAjax = function (self) {
    var form = $(self).parents("form");
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/editarFormAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function (data) {
            var idActividad = data.idActividad;
            var htmlEditarForm = data.htmlEditarForm;
            $("#actividad-content-" + idActividad).html(htmlEditarForm);
        }
    };
    var selectores = {
        divCargando: $("#cargando-principal"),
        divError: form.find(".error")
    };
    templateAjax1(confAjax, selectores);
    return false;
};

var actividadEditarAjax = function (self) {
    var form = $(self).parents("form");
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/editarAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function (data) {
            var idActividad = data.idActividad;
            var htmlActividad = data.htmlActividad;
            $("#actividad-content-" + idActividad).html(htmlActividad);
        }
    };
    var selectores = {
        divCargando: $("#cargando-principal"),
        divExito: $("#exito-principal"),
        divError: form.find(".error")
    };
    templateAjax1(confAjax, selectores);
    return false;
};