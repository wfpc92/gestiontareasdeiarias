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

            var items = $($("#tareas-" + idActividad + " .items")[0]);
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
        cargando: {
            div: $("#cargando-principal")
        },
        exito: {
            div: $("#exito-principal"),
            mensaje: "La Tarea fue creada, edita sus datos."
        },
        error: {
            div: $(form).find(".error")
        }
    };

    templateAjax1(confAjax, selectores);
    return false;
};

var tareaCrearPoolAjax = function (self) {
    var form = $(self);

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
            var items = $("#lst-pool-tareas");
            var divsItems = $("#lst-pool-tareas .items > div");

            console.log(items);
            console.log(divsItems);

            if (divsItems.length === 0) {
                items.html("");
            }
            items.append(htmlTarea);
            $("#txt-tarea").val("");

            //mostrarPanelDerecho(htmlTareaEditar);
            //actualizarProgressBar(progressBar);
            //menus();
        }
    };

    var selectores = {
        cargando: {
            div: $("#cargando-principal")
        },
        exito: {
            div: $("#exito-principal"),
            mensaje: "Tarea Creada."
        },
        error: {
            div: $("#error-principal")
        }
    };

    templateAjax1(confAjax, selectores);
    return false;
};