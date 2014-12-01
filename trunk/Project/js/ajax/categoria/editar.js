var categoriaEditarFormAjax = function(self) {
    var form = $(self).parents("form");
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/editarFormAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var idCategoria = data.idCategoria;
            var htmlEditarForm = data.htmlEditarForm;
            $("#categoria-content-" + idCategoria).html(htmlEditarForm);
        }
    };

    var selectores = {
        cargando: {
            div: $("#cargando-principal")
        },
        error: {
            div: $("#error-form-categoria")
        }
    };

    templateAjax1(confAjax, selectores);
    return false;
};

var categoriaEditarAjax = function(self) {
    var form = $(self);
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/editarAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var idCategoria = data.idCategoria;
            var htmlCategoria = data.htmlCategoria;
            $("#categoria-content-" + idCategoria).html(htmlCategoria);
            return false;
        }
    };

    var selectores = {
        cargando: {
            div: $("#cargando-principal")
        },
        exito: {
            div: $("#exito-principal")
        },
        error: {
            div: form.find(".error")
        }
    };

    templateAjax1(confAjax, selectores);
    return false;
};