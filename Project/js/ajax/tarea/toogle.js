var tareaToogle = function (self) {
    var contenedor = $(self).siblings("div .desplegable").eq(0);//el que dice actividades por categoria
    console.log(contenedor);
    contenedor.slideToggle();
    return false;
};
