$(function () {

    $(".js-menu").on("mouseover", function (e) {

        $(this).find(".dropdown").on("click", function (e) {
            
            if ($(this).hasClass("show")) {
                
                $(this).removeClass("show");
                $(this).find("div").removeClass("show");
                $(this).siblings().removeClass("show");
                $(this).siblings().find("div").removeClass("show");
            } else {
                
                $(this).siblings().removeClass("show");
                $(this).siblings().find("div").removeClass("show");
                $(this).addClass("show");
                $(this).find("div").addClass("show");
            }
        });

        $(".js-menu").off("mouseover");
    });
   
});   