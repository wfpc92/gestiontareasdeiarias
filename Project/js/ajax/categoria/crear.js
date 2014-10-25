var categoriaCrearAjax = function(form) {
    $.ajax({
        type: 'POST',
        url: $(form).attr('action'),
        data: $(form).serialize(),
        dataType: 'json',
        beforeSend: function() {
            var divCargando = $("#cargando-principal");
            var txtCategoria = $(form).find("input");
            var divError = $("#cargando-principal");
            mostrarCargando(divCargando);

            //if (!validarEntrada(txtCategoria)) {
            //    mostrarMensaje(divError, "Este campo no puede estar vacio.");
                return false;
            //}
        },
        success: function(data) {
            var idCategoria = data.idCategoria;
            var htmlCategoria = data.htmlCategoria;
            var motivo = data.motivo;

            var items = $("#categoria-list-view > .items");
            var divsItems = $("#categoria-list-view .items > div");
            if (divsItems.length === 0) {
                items.html("");
            }
            items.append(htmlCategoria);
            $("#txt-categoria").val("");
            //ocultarCargando("#cargando-principal");
        },
        error: function(xhr, text, thr) {
            console.log(xhr)
            $("#error-principal")
                    .css('display', 'block')
                    .css('background', 'red')
                    .text("Verifique su conexión a Internet.");
        }
    });
    return false;
};


var categoriaToogle = function(self) {
    var contenedor = $(self).parent("div");
    $(contenedor).siblings("div").eq(0).slideToggle();
    return false;
};

var categoriaMenu = function(self) {
    var contenedor = $(self);
    $(contenedor).siblings("ul").eq(0).slideToggle();
    return false;
};

