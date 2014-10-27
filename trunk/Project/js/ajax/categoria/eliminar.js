var categoriaEliminarModal = function(self) {
    var form = $(self).parents("form");
    $("<div>")
            .html("¿Estas seguro que deseas eliminar esta categoria?")
            .dialog({
                title: "Eliminar Categoria",
                resizable: false,
                width: 500,
                modal: true,
                buttons: {
                    "Borrar Categoria": function() {
                        categoriaEliminarAjax(form);
                        $(this).dialog("close");
                    },
                    Cancel: function() {
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
            var motivo = data.motivo;
            var idCategoria = data.idCategoria;
            //obtener la lista de categorias.
            var idCategoriaActual = "#categoria-" + idCategoria;
            $("div").remove(idCategoriaActual);
        }
    };
    var selectores = {
        divCargando: $("#cargando-principal"),
        divError: $("#error-form-categoria")
    };
    templateAjax1(confAjax, selectores);
    return false;
};