var tareaMostrarAjax = function (self) {
    var form = $(self).parents("form");
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/tarea/mostrarAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function (data) {
            var htmlTareaEditar = data.htmlTareaEditar;
            var idActividad = data.idActividad;
            var idTarea = data.idTarea;
            if (idTarea) {
                mostrarPanelDerecho(htmlTareaEditar)
            }
        }
    };
    var selectores = {
        divCargando: $("#cargando-principal"),
        divError: $("#error-principal")
    };
    templateAjax1(confAjax, selectores);
    return false;
};
var tareaMostrarPoolAjax = function (self) {
    var form = $(self).parent("form");
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/tarea/mostrarPoolAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function (data) {
            var htmlTareaEditar = data.htmlTareaEditar;
            var idActividad = data.idActividad;
            var idTarea = data.idTarea;
            if (idTarea) {
                mostrarPanelDerecho(htmlTareaEditar)
            }
        }
    };
    var selectores = {
        divCargando: $("#cargando-principal"),
        divError: $("#error-principal")
    };
    templateAjax1(confAjax, selectores);
    return false;
};