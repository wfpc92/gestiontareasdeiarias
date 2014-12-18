var tareaPausarAjax = function(self) {
    var form = $(self).parents("form");
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/tarea/pausarRegistroTareaAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var idTarea = data.idTarea;
            var idRegistroTareaUltimo = data.idRegistroTareaUltimo;
            var duracionUltimo = data.duracionUltimo;
            var idRegistroTarea = data.idRegistroTarea;
            var error = data.error;

            var txtUltimoRT = $("#txt-registro-tarea-duracion-" + idRegistroTareaUltimo);
            if (txtUltimoRT.val() == '0') {
                txtUltimoRT.val(duracionUltimo);
            }

            form.siblings(".desplegable").show();
            /*//seleccionar la lista donde se van a agregar el registro.
            var items = $("#lst-registro-tarea-" + idTarea + " .items");
            var divsItems = $("#lst-registro-tarea-" + idTarea + " .items > div");
            if (divsItems.length === 0) {
                items.html("");
            }
            items.append(htmlRegistroTarea);*/
            deshabilitarPausa(idTarea);
            habilitarPlay(idTarea);
            actualizarDuracionTarea(idTarea);
        }
    };

    var selectores = {
        cargando: {
            div: $("#cargando-principal")
        },
        exito: {
            div: $("#exito-principal"),
            mensaje: "Inicia un nuevo registro de tiempo."
        },
        error: {
            div: $("#error-principal")
        }
    };

    templateAjax1(confAjax, selectores);
    return false;
};


var actualizarDuracionTarea = function(idTarea) {
    var duracion = 0;
    var lblDuracion = $("#p-duracion-tarea-" + idTarea);
    var arrDuracion = $("#lst-registro-tarea-" + idTarea + " .items .duracion-registro-tarea");

    arrDuracion.each(function() {
        var strDuracion = $(this).val();
        duracion += Number(strDuracion);
    });
    lblDuracion.text(duracion);
    return null;
};
