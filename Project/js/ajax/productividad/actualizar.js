var productividadActualizarAjax = function(self) {
    var form = $(self);
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action'),
        data: $(form).serialize(),
        dataType: 'json'
    };
    var selectores = {
        cargando: {
            div: $("#cargando-principal")
        },
        exito: {
            div: $("#exito-principal"),
            mensaje: "Productividad del día actualizada."
        },
        error: {
            div: $("#error-principal")
        }
    };
    templateAjax1(confAjax, selectores);
    return false;
};


