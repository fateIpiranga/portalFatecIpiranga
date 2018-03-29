$(document).ready(function () {
    $.ajax({
        url: "../teste/retornaListaNoticias.json",
        method: "GET",
        data: {
            conteudo: ""
        },
        success: onNoticiasOk,
        error: onNoticiaErro
    });

    function onNoticiasOk(noticias) {

        var divNoticia = $(".js-noticia");
        noticias.forEach(function (noticia) {

            divNoticia.append('<div class="row"><div class="col-md-3"><a class="link-noticia" href="' + noticia.urlRedireciona + '"><img src="img/' + noticia.imagemDestaque + '" height="100%" width="100%"/></a></div><div class="col-md-9"><h3>' + noticia.titulo + '</h3><p>' + noticia.chamada + '</p><small>' + noticia.data + '</small> </div> </div>');
            divNoticia.append("<hr>");
        });
    }

    function onNoticiaErro() {
        console.log("Erro ao carregar slides");
    }
});
