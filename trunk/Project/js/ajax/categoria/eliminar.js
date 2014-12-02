var categoriaEliminarModal = function(self) {
    var form = $(self).parents("form");
    var nombreCategoria = form.siblings().children("a").text();

    $("<div>")
            .html("¿Está seguro de eliminar la Categoría: \n\
                    \"" + nombreCategoria + "\"? \
                    Si elimina la Categoría se eliminarán las \n\
                    actividades actividades y las tareas \n\
                    asociadas a ella.")
            .dialog({
                title: "Eliminar Categoría",
                resizable: false,
                width: 500,
                modal: true,
                buttons: {
                    "Borrar Categoría": function() {
                        categoriaEliminarAjax(form);
                        $(this).dialog("close");
                    },
                    Cancelar: function() {
                        $(this).dialog("close");
                    }
                }
            });
    return false;
};

var categoriaEliminarAjax = function(form) {
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/eliminarAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var borrar = data.borrar;
            var idCategoria = data.idCategoria;
            //obtener la lista de categorias.
            var idCategoriaActual = "#categoria-" + idCategoria;
            $("div").remove(idCategoriaActual);
            var items = $("#itemsCategoria .list-view .items > .view")
            if (items.length === 0) {
                $("#itemsCategoria .list-view .items").text("No se encontraron resultados.");
            }
        }
    };

    var selectores = {
        cargando: {
            div: $("#cargando-principal")
        },
        exito: {
            div: $("#exito-principal"),
            mensaje: "Categoría eliminada."
        },
        error: {
            div: $("#error-form-categoria")
        }
    };

    templateAjax1(confAjax, selectores);
    return false;
};