var categoriaEditarFormAjax = function(self) {
    var form = $(self).parents("form");
    $.ajax({
        type: 'POST',
        url: $(form).attr('action') + '/editarFormAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var idCategoria = data.idCategoria;
            var htmlEditarForm = data.htmlEditarForm;
            $("#categoria-content-" + idCategoria).html(htmlEditarForm);
        },
        error: function() {
            alert("ERROR: categoriaEditarFormAjax conexion fallida");
        }
    });
    return false;
};

var categoriaEditarAjax = function(self) {
    var form = $(self);
    $.ajax({
        type: 'POST',
        url: $(form).attr('action') + '/editarAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var idCategoria = data.idCategoria;
            var htmlCategoria = data.htmlCategoria;
            $("#categoria-content-" + idCategoria).html(htmlCategoria);
            return false;
        },
        error: function() {
            alert("ERROR: categoriaEditarFormAjax conexion fallida");
        }
    });
    return false;
};