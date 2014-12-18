var tareaActualizarAjax = function(form) {
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/tarea/actualizarAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var idTarea = data.idTarea;
            var txtNombreTarea = $("#txt-tarea-nombre-" + idTarea);
            var pViejoTarea = $("#p-tarea-nombre-" + idTarea);
            pViejoTarea.text(txtNombreTarea.val());
            tareaPoolToogle3(form);
        }
    };

    var selectores = {
        cargando: {
            div: $("#cargando-principal")
        },
        exito: {
            div: $("#exito-principal")
        },
        error: {
            div: $(form).find(".error")
        }
    };

    templateAjax1(confAjax, selectores);
    return false;
};