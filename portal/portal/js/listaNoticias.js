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

        var divNoticia = $(".js-listaNoticias");
        noticias.forEach(function (noticia) {

            divNoticia.append('<div class="col-lg-3 col-md-4 col-sm-6 portfolio-item"><div class="card h-100  card-borda"><a href="' + noticia.urlRedireciona + '"></a><img class="card-img-top" src="img/' + noticia.imagemDestaque + '" alt=""></a><div class="card-body"><h4 class="card-title"><a href="' + noticia.urlRedireciona + '"><h3>' + noticia.titulo + '</h3></a></h4><p class="card-text">' + noticia.chamada + '</p><hr><small>' + noticia.data + '</small></div></div></div>');
        });
    }

    function onNoticiaErro() {
        console.log("Erro ao carregar notícias.");
    }
});