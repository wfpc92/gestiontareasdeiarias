var categoriaEditarFormAjax = function (self) {
    var form = $(self).parents("form");
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/editarFormAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function (data) {
            var idCategoria = data.idCategoria;
            var htmlEditarForm = data.htmlEditarForm;
            $("#categoria-content-" + idCategoria).html(htmlEditarForm);
        }
    };
    var selectores = {
        divCargando: $("#cargando-principal"),
        divError: $("#error-form-categoria")
    };
    templateAjax1(confAjax, selectores);
    return false;
};

var categoriaEditarAjax = function (self) {
    var form = $(self);
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/editarAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function (data) {
            var idCategoria = data.idCategoria;
            var htmlCategoria = data.htmlCategoria;
            $("#categoria-content-" + idCategoria).html(htmlCategoria);
            return false;
        }
    };
    var selectores = {
        divCargando: $("#cargando-principal"),
        divExito: $("#exito-principal"),
        divError: form.find(".error")
    };
    templateAjax1(confAjax, selectores);
    return false;
};