$(document).ready(function() {
    $("#content-princ-der").hide()
            .css("width", "0%");
    $("#content-princ-izq").css("width", "100%");
    $("ul.categoria li").mouseout(function() {
        $("ul.categoria").hide();
    });
    $("ul.actividad li").mouseout(function() {
        $("ul.actividad").hide();
    });
    $("ul.tarea li").mouseout(function() {
        $("ul.tarea").hide();
    });
    
    if ($(window).width() <= 700) {
        $(".actividadesPorCate .list-view .items .view form div a").click(function() {
            $("#contentIzq").hide();
            $("#contentDer").show();
        });
    }
});