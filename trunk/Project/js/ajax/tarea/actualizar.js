var tareaActualizarAjax = function (form) {
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/tarea/actualizarAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function (data) {
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