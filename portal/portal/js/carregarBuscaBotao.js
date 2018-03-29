$(document).ready(function () {
    carregaConteudo();

    function carregaConteudo() {

        $.urlParam = function (name) {
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            return results[1] || 0;
        }

        var textoBuscado = $.urlParam("p");
       // var tipo = queryString("t");
        //var pConteudo = queryString("p");
        

        $.ajax({
            url: "http://localhost:55108/api/Pesquisa/" + textoBuscado,  
        method: "GET",
        success: onNoticiasOk,
        error: onNoticiaErro
    });

    function onNoticiasOk(noticias) {

        var divNoticia = $(".js-noticia");
        noticias.forEach(function (noticia) {

            divNoticia.append('<div class="row"><div class="col-md-3"><a class="link-noticia" href="http://localhost:55108/conteudo.html?ctdid=' + noticia.Codigo + '"><img src="img/' + noticia.Codigo + '.jpg" height="100%" width="100%"/></a></div><div class="col-md-9"><h3>' + noticia.Titulo + '</h3><p>' + noticia.Descritivo + '</p><small>' + noticia.DataPublicado + '</small> </div> </div>');
            divNoticia.append("<hr>");
        });
    }

    function onNoticiaErro() {
        console.log("Erro ao carregar slides");
    }
});
