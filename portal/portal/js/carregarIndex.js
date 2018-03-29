$(document).ready(function () {

    carregaListaDisciplina();
    carregarNoticiasDestaque();


    function carregaListaDisciplina() {
        $("[id^=cursoCard]").hide();
        $.ajax({
            url: "../teste/retornaListaCurso.json",
            method: "GET",
            data: {
                conteudo: ""
            },
            success: function (cursos) {
                var cont = 0;
                cursos.forEach(function (curso) {
                    if (curso.titulo.length > 0) $("#cursoCard"+ cont).show();
                    $("#imagemCurso"+ cont).prop("src",curso.imagemDestaque);
                    $("#tituloCurso" + cont).text(curso.titulo);
                    $("#chamadaCurso" + cont).text(curso.chamada);             
                    $("#tituloCurso" + cont).prop("href", curso.urlRedireciona);
                    cont++;
                });
            }
    ,
            error: function () {
                console.log("Erro ao carregar cursos.");
            }
        });
    }



    function carregarNoticiasDestaque() {
       // $("[id^=noticia]").hide();
        $.ajax({
            url: "../teste/retornaListaNoticias.json",
            method: "GET",
            data: {
                conteudo: ""
            },
            success: function (noticias) {
                var cont = 0;
                noticias.forEach(function (noticia) {                                    
                    if (noticia.titulo.length > 0) $("#noticia" + cont).show();
                    $("#noticiaTitulo" + cont).text(noticia.titulo);
                    $("#noticiaChamada" + cont).text(noticia.chamada);
                    $("#noticiaLink" + cont).prop("href", noticia.urlRedireciona);                    
                    cont++;
                });
            }
            ,
            error: function () {
                console.log("Erro ao carregar notícias.");
            }
        });
    }

});
    

