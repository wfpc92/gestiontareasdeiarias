var tareaActualizarAjax = function(form) {
    $.ajax({
        type: 'POST',
        url: $(form).attr('action'),
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var idTarea = data.idTarea;
            var txtNombreTarea = $("#txt-tarea-nombre-" + idTarea);
            var pViejoTarea = $("#p-tarea-nombre-" + idTarea);
            pViejoTarea.text(txtNombreTarea.val());
        },
        error: function() {
            alert("ERROR: tareaActualizarAjax conexion fallida");
        }
    });
    return false;
};

var tareaCheckAjax = function(self) {
    var form = $(self).parent("form");
    $.ajax({
        type: 'POST',
        url: $(form).attr('action') + "/tarea/checkAjax",
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {

        },
        error: function() {
            alert("ERROR: tareaCheckAjax conexion fallida");
        }
    });
    return false;
};
