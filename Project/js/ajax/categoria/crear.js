var categoriaCrearAjax = function(form) {
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action'),
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data, textStatus, jqXHR) {
            var idCategoria = data.idCategoria;
            var htmlCategoria = data.htmlCategoria;
            var error = data.error;

            var items = $("#categoria-list-view > .items");
            var divsItems = $("#categoria-list-view .items > div");
            if (divsItems.length === 0) {
                items.html("");
            }
            items.append(htmlCategoria);
            $("#txt-categoria").val("");
            menus();
        }
    };

    var selectores = {
        cargando: {
            div: $("#cargando-principal")
        },
        exito: {
            div: $("#exito-principal"),
            mensaje: "Categoria creada."
        },
        error: {
            div: $("#error-form-categoria")
        }
    };
    templateAjax1(confAjax, selectores);
    return false;
};