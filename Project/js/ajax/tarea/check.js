var tareaCheckAjax = function(self) {
    var form = $(self).parent("form");
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + "/tarea/checkAjax",
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var idTarea = data.idTarea;
            var estado = data.estado;
            var progressBar = data.progressBar;
            if (estado == 'FINALIZADA') {
                deshabilitarPlay(idTarea);
                deshabilitarPausa(idTarea);
            } else {
                habilitarPlay(idTarea);
                habilitarPausa(idTarea);
            }
            actualizarProgressBar(progressBar);
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
