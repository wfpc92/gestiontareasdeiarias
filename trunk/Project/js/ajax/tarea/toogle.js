var tareaToogle = function(self) {
    var contenedor = $(self).parent("form").siblings(".desplegable").eq(0);//el que dice actividades por categoria
    contenedor.slideToggle();
    return false;
};

//esta se llama cuando se da click en el <p> del pool de tareas.
var tareaPoolToogle = function(self) {
    var contenedor = $(self).parents("form").siblings(".desplegable").eq(0);//el que dice actividades por categoria
    contenedor.slideToggle();
    return false;
};

//esta se llama en cerrar
var tareaPoolToogle2 = function(self) {
    var contenedor = $(self).parents("form").parents(".desplegable").eq(0);//el que dice actividades por categoria
    contenedor.slideToggle();
    return false;
};

//esta se llama en guardar
var tareaPoolToogle3 = function(self) {
    //self: formulario
    var contenedor = $(self).parents(".desplegable").eq(0);//el que dice actividades por categoria
    contenedor.slideToggle(900);
    return false;
};
