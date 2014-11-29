var tareaCrearAjax = function (form) {
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action'),
        data: $(form).serialize(),
        dataType: 'json',
        success: function (data) {
            var htmlTarea = data.htmlTarea;
            var htmlTareaEditar = data.htmlTareaEditar;
            var idActividad = data.idActividad;
            var progressBar = data.progressBar;

            var items = $("#tareas-" + idActividad + " .items");
            var divsItems = $("#tareas-" + idActividad + " .items > div");
            if (divsItems.length === 0) {
                items.html("");
            }
            items.append(htmlTarea);
            $("#txt-tarea-" + idActividad).val("");

            mostrarPanelDerecho(htmlTareaEditar);
            actualizarProgressBar(progressBar);
            menus();
        }
    };
    var selectores = {
        divCargando: $("#cargando-principal"),
        divExito: $("#exito-principal"),
        divError: $(form).find(".error")
    };
    templateAjax1(confAjax, selectores);
    return false;
};

var tareaCrearPoolAjax = function (form) {
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action'),
        data: $(form).serialize(),
        dataType: 'json',
        success: function (data) {
            var htmlTarea = data.htmlTarea;
            var htmlTareaEditar = data.htmlTareaEditar;
            var idActividad = data.idActividad;
            //var idTarea = data.idTarea;
            var progressBar = data.progressBar;
            var items = $("#tareas-" + idActividad + " .items");
            var divsItems = $("#tareas-" + idActividad + " .items > div");

            if (divsItems.length === 0) {
                items.html("");
            }
            items.append(htmlTarea);
            $("#txt-tarea-" + idActividad).val("");

            mostrarPanelDerecho(htmlTareaEditar);
            actualizarProgressBar(progressBar);
            menus();
        }
    };
    var selectores = {
        divCargando: $("#cargando-principal"),
        divError: $(form).find(".error")
    };
    templateAjax1(confAjax, selectores);
    return false;
};