$(document).ready(function() {
    console.log('Hola desde consola');

    $("#yw0 .items .view > a").click(function() {
        $(this).siblings().eq(0).slideToggle();
        return false;
    });

});