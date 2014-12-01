var categoriaCargarAjax = function(select) {
    var form = $(select).parents("form");

    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/categoria/cargarActividadesAjax',
        data: $(select).serialize(),
        dataType: 'json',
        success: function(data, textStatus, jqXHR) {
            var idCategoria = data.idCategoria;
            var htmlActividades = data.htmlActividades;
            var error = data.error;
            $("#div-lst-actividades").html(htmlActividades);
            menus();
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
