var tareaCheckAjax = function (self) {
    var form = $(self).parent("form");
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + "/tarea/checkAjax",
        data: $(form).serialize(),
        dataType: 'json',
        success: function (data) {
            var progressBar = data.progressBar;
            actualizarProgressBar(progressBar);
        }
    };
    var selectores = {
        divCargando: $("#cargando-principal"),
        divError: $("#error-principal")
    };
    templateAjax1(confAjax, selectores);
    return false;
};
