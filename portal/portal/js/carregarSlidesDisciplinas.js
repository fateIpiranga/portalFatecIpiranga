$(document).ready(function () {
    $.ajax({
        url: "http://localhost:55108/api/slide",
        method: "GET",
        data: {
            status: "0",
            grupo: "cursos"
        },
        success: onSlidesOk,
        error: onError
    });

    function onSlidesOk(slides) {
        var cont = 1;
        var classe = ".carrossel-item-1"
        $(classe).css("background-image", "url('" + slides[0].Imagem + "')");
        $(classe + " a").prop("href", slides[0].Url);
        $(classe + " div").html("<h3>" + slides[0].Titulo + "</h3><p>" + slides[0].Mensagem + "</p>");

        slides.forEach(function (slide) {
            if (cont === 1) {
                cont++;
                return;
            }
            
            $(".js-slide ol").append('<li data-target="#carouselExampleIndicators" data-slide-to="' + cont + '"></li>');
            $('.js-carousel').append('<div class="carousel-item carrossel-item-' + cont + '">');
            $('.carrossel-item-' + cont).css('background-image', 'url("' + slide.Imagem + '")');
            $('<a class="link' + cont + '" href="' + slide.Url + '">').appendTo('.carrossel-item-' + cont);
            $('<div class="carousel-caption d-none d-md-block">').appendTo('.link' + cont);
            $('<h3>' + slide.Titulo + '</h3>').appendTo('.link' + cont + ' div');
            $('<p>' + slide.Mensagem + '</p>').appendTo('.link' + cont + ' div');
            cont++;
        });
    }

    function onError() {
        console.log("Erro ao carregar slides");
    }
});
