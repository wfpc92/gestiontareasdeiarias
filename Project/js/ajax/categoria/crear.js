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
    $(self).siblings().eq(0).slideToggle();
    return false;
}