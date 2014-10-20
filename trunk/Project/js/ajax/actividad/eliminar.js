var actividadEliminarAjax = function(self) {
    var form = $(self).parents("form");
    console.log(form);
    $.ajax({
        type: 'POST',
        url: $(form).attr('action') + '/eliminarAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            /*var borrar = data.borrar;
             var motivo = data.motivo;
             var idCategoria = data.idCategoria;
             //obtener la lista de categorias.
             var idCategoriaActual = "#categoria-" + idCategoria;
             $("div").remove(idCategoriaActual);
             */
        },
        error: function() {
            alert("ERROR: categoriaEliminarAjax conexion fallida");
        }
    });
    //event.preventDefault();
    return false;
};