var tareaIniciarAjax = function (self) {
    var form = $(self).parents("form");
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/tarea/crearRegistroTareaAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function (data) {
            var idTarea = data.idTarea;
            var idRegistroTarea = data.idRegistroTarea;
            var htmlRegistroTarea = data.htmlRegistroTarea;

            //mostrar los registros.
            form.siblings(".desplegable").show();

            //seleccionar la lista donde se van a agregar el registro.
            var items = $("#lst-registro-tarea-" + idTarea + " .items");
            var divsItems = $("#lst-registro-tarea-" + idTarea + " .items > div");
            if (divsItems.length === 0) {
                items.html("");
            }
            items.append(htmlRegistroTarea);
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