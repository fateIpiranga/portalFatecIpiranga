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

        var rowNoticia = ".js-noticia";
        var cont = 1;
        noticias.forEach(function (noticia) {
            var classe = rowNoticia.concat(cont);
            var url = noticia.urlRedireciona;
            var titulo = noticia.titulo;
            var img = "img/" + noticia.imagemDestaque;
            var data = noticia.data;
            var texto = noticia.chamada;

            $(classe + " a").css("background-image", "url('" + img + "')");
            $(classe + " a").prop("href", url);
            $(classe + " h3").text(titulo);
            $(classe + " p").text(texto);
            $(classe + " small").text(data);

            cont++;
        });
    }

    function onNoticiaErro() {
        console.log("Erro ao carregar slides");
    }
});
