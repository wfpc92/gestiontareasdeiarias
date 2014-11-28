var registroTareaActualizarAjax = function(self) {
    var form = $(self);
    
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/tarea/actualizarRegistroTareaAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {

        }
    };
    var selectores = {
        divCargando: $("#cargando-principal"),
        divError: $("#error-principal")
    };
    templateAjax1(confAjax, selectores);
    return false;
};
