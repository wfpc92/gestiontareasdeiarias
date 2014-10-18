$(document).ready(function() {
    $("#content-princ-der").hide();
    $("#content-princ-izq").css("width", "100%");
    $("#content-princ-der").css("width", "0%");
    
    $("#categoria-list-view .items .view a.menu-categoria").click(function() {
        $(this).siblings().eq(2).slideToggle();
        return false;
    });
    
    $(".actividadesPorCate .list-view .items .view a.menu-actividad").click(function() {
        $(this).siblings().eq(1).slideToggle();
        return false;
    });
    
    $("#content-princ-izq .list-view .items .view a.menu-tarea").click(function() {
        alert("Hola soy menu tarea");
        return false;
    });    
    
});
