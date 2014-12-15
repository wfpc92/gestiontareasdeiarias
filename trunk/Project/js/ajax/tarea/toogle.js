var tareaToogle = function(self) {
    var contenedor = $(self).parent("form").siblings(".desplegable").eq(0);//el que dice actividades por categoria
    contenedor.slideToggle();
    return false;
};

var tareaPoolToogle = function(self) {
    var contenedor = $(self).parents("form").siblings(".desplegable").eq(0);//el que dice actividades por categoria
    contenedor.slideToggle();
    return false;
};

var tareaPoolToogle2 = function(self) {
    var contenedor = $(self).parents("form").parents(".desplegable").eq(0);//el que dice actividades por categoria
    contenedor.slideToggle();
    return false;
};
