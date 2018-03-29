$(document).ready(function () {
    var pCurso = queryString("curso");

    carregarSlideCurso(pCurso);
    retornaListaNoticias(pCurso); 
    carregarTextoCurso(pCurso);

    function carregarTextoCurso(p) {
        $.ajax({
            url: "../teste/retornaDetalheCurso.json",
            method: "GET",
            data: {
                curso: p
            },
            success: function (obj) {
                alert(obj);
                $("#imagemResumoCurso").prop("src", obj.imagem);
                $("#tituloResumoCurso").text(obj.titulo);
                $("#ResumoCurso").text(obj.texto);                
            },
            error: onError
        });

    }

    function carregarSlideCurso(p) {
        $.ajax({
            url: "../teste/retornaSlideCurso.json",
            method: "GET",
            data: {
               curso: p
            },
            success: onSlidesOk,
            error: onError
        });
    }

    function onSlidesOk(slides) {

        var cont = 1;
        var fragmentoUrl = "img/";
        var fragmentoClasse = ".carrossel-item-";

        slides.forEach(function (slide) {
            var url = fragmentoUrl.concat(slide.imagem);
            var classe = fragmentoClasse.concat(cont);
            $(classe).css("background-image", "url('" + url + "')");
            $(classe + " a").prop("href", slide.urlRedireciona);
            $(classe + " div").html("<h3>" + slide.titulo + "</h3><p>" + slide.mensagem + "</p>");
            cont++;
        });
    }

    function onError() {
        console.log("Erro ao carregar slides");
    }

    function retornaListaNoticias(p) {
        $.ajax({
            url: "../teste/retornaListaNoticias.json",
            method: "GET",
            data: {
                curso: p
            },
            success: onNoticiasOk,
            error: onError
        });
    }

    function onNoticiasOk(noticias) {

        var divNoticia = $(".js-noticia");
        noticias.forEach(function (noticia) {

            divNoticia.append('<div class="row"><div class="col-md-3"><a class="link-noticia" href="' + noticia.urlRedireciona + '"><img src="img/' + noticia.imagemDestaque + '" height="100%" width="100%"/></a></div><div class="col-md-9"><h3>' + noticia.titulo + '</h3><p>' + noticia.chamada + '</p><small>' + noticia.data + '</small> </div> </div>');
            divNoticia.append("<hr>");
        });
    }

  
});
