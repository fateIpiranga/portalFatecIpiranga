$(document).ready(function() {
        $.ajax({
            url: "../teste/retornaListaCurso.json",
            method: "GET",
            data: {
                conteudo: ""
            },
            sucess: conteudoDestaque,
            error: conteudoDestaqueErro
        });

        function conteudoDestaque(msg) {
            console.log(msg);
        }
        function conteudoDestaqueErro() {
            console.log("Erro.");
        }
});
    
