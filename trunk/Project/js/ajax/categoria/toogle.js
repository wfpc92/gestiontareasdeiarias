var categoriaToogle = function(self) {
    var contenedor = $(self).parent("div");
    $(contenedor).siblings("div").eq(0).slideToggle();
    return false;
};