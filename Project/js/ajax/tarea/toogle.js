var tareaToogle = function (self) {
    var contenedor = $(self).parent("form").siblings(".desplegable").eq(0);//el que dice actividades por categoria
    contenedor.slideToggle();
    return false;
};
