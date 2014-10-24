var tareaCerrar = function(self) {
    $("#content-princ-izq")
            .css("width", "100%");
    $("#content-princ-der")
            .css("width", "0%")
            .html("");
    if ($(window).width() <= 1200) {
        $(".botones").css("margin-right", "40px")
    } else {
        $(".botones").css("float", "right")
                .css("margin-right", "25%")
                .css("margin-top", "-17px");
    }
    if ($(window).width() <= 920) {
        $(".form-tarea p").css("padding", "0 40px 10px 33px");
    } else {
        $(".form-tarea p").css("padding", "0px");  
    }
    
    
    return false;
};
