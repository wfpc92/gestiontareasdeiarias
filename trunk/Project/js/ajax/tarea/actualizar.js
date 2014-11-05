var tareaEditarAjax = function (form){
    //console.log(form);
    form.action += '/tarea/actualizarAjax';
    console.log(form);
    tareaActualizarAjax(form)
    return false;
}

var tareaActualizarAjax = function(form) {
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action'),
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var idTarea = data.idTarea;
            var txtNombreTarea = $("#txt-tarea-nombre-" + idTarea);
            var pViejoTarea = $("#p-tarea-nombre-" + idTarea);
            pViejoTarea.text(txtNombreTarea.val());
        }
    };
    var selectores = {
        divCargando: $("#cargando-principal"),
        divError: $(form).find(".error")
    };
    templateAjax1(confAjax, selectores);
    return false;
};

var tareaCheckAjax = function(self) {
    var form = $(self).parent("form");
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + "/tarea/checkAjax",
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
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