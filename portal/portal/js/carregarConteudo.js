$(document).ready(function () {

    carregaConteudo();
  
    function carregaConteudo() {

        $.urlParam = function (name) {
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            return results[1] || 0;
        }

        var idConteudo = $.urlParam("ctdid");
        var tipo = queryString("t");
        var pConteudo = queryString("p");
        
        $.ajax({
            url: "http://localhost:55108/api/conteudo/" + idConteudo,
            method: "GET",     
            success: function (conteudo) {
                var cont = 0;            
                $("#dataConteudo").text(conteudo.DataPublicado);
                $("#conteudo").text(conteudo.Descritivo);
                $("#tituloConteudo").text(conteudo.Titulo);
              
                if (conteudo.imagem != "") {
                    $("#imagemConteudo").prop("src", "img/" + idConteudo + ".jpg");
                } else {
                    $("#imagemConteudo").hide();
                }

                if (tipo == "N") {
                    $("#areaConteudo").text("Noticias");
                } else {
                    $("#areaConteudo").text("Detalhe");
                }                                                       
            }
            ,
            error: function () {
                console.log("Erro ao carregar cursos.");
            }
        });
    }

    

});


