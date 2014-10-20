var categoriaCrearAjax = function(form) {
    $.ajax({
        type: 'POST',
        url: $(form).attr('action'),
        data: $(form).serialize(),
        success: function(data) {
            var items = $("#categoria-list-view > .items");
            var divsItems = $("#categoria-list-view .items > div");
            if (divsItems.length === 0) {
                items.html("");
            }
            items.append(data);
            $("#txt-categoria").val("");
        },
        error: function() {
            alert("ERROR: categoriaCrearAjax conexion fallida");
        }
    });
    return false;
};


var categoriaToogle = function(self) {
    var contenedor = $(self).parent("div");
    $(contenedor).siblings("div").eq(0).slideToggle();
    return false;
}

var categoriaMenu = function(self) {
    var contenedor = $(self);
    $(contenedor).siblings("ul").eq(0).slideToggle();
    return false;
}