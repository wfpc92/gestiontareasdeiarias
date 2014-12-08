var registroTareaActualizarAjax = function (self) {
    menus();
    var form = $(self);

    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/tarea/actualizarRegistroTareaAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function (data) {
            var idTarea = data.idTarea;
            actualizarDuracionTarea(idTarea);
        }
    };

    var selectores = {
        cargando: {
            div: $("#cargando-principal")
        },
        error: {
            div: $("#error-principal")
        }
    };

    templateAjax1(confAjax, selectores);
    return false;
};
