var categoriaEliminarModal = function (self) {
    var form = $(self).parents("form");
    var nombreCategoria = form.siblings().children("a").text();

    $("<div>")
            .html("¿Estas seguro que deseas eliminar la Categoría: \"" + nombreCategoria + "\"?")
            .dialog({
                title: "Eliminar Categoría",
                resizable: false,
                width: 500,
                modal: true,
                buttons: {
                    "Borrar Categoría": function () {
                        categoriaEliminarAjax(form);
                        $(this).dialog("close");
                    },
                    Cancel: function () {
                        $(this).dialog("close");
                    }
                }
            });
    return false;
};

var categoriaEliminarAjax = function (form) {
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/eliminarAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function (data) {
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
        divCargando: $("#cargando-principal"),
        divExito: $("#exito-principal"),
        divError: $("#error-form-categoria")
    };
    templateAjax1(confAjax, selectores);
    return false;
};