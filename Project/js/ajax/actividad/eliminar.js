var actividadEliminarModal = function(self) {
    var form = $(self).parents("form");
    $("<div>")
            .html("¿Estas seguro que deseas eliminar esta Actividad?")
            .dialog({
                title: "Eliminar Actividad",
                resizable: false,
                width: 500,
                modal: true,
                buttons: {
                    "Borrar Actividad": function() {
                        actividadEliminarAjax(form);
                        $(this).dialog("close");
                    },
                    Cancel: function() {
                        $(this).dialog("close");
                    }
                }
            });
    return false;
};

var actividadEliminarAjax = function(form) {
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/eliminarAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var borrar = data.borrar;
            var error = data.error;
            var idActividad = data.idActividad;
            //obtener la lista de categorias.
            var idActividadActual = "#actividad-" + idActividad;
            $("div").remove(idActividadActual);
        }
    };
    var selectores = {
        divCargando: $("#cargando-principal"),
        divError: form.find(".error")
    };
    templateAjax1(confAjax, selectores);
    return false;
};