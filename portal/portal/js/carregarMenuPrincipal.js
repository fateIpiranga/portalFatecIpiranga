$(document).ready(function () {
    $.ajax({
        url: "../teste/retornaMenuPrincipal.json",
        method: "GET",
        data: {
            conteudo: ""
        },
        success: onLinksOk,
        error: onLinkErro

    });

    function onLinksOk(links) {
        var menu = $(".js-menu");
        links.forEach(function (link) {
            if (link.itens.item.length === 0) {
                menu.append('<li class="nav-item"><a class="nav-link nav-link--cabecalho" href="' + link.urlRedireciona + '">' + link.titulo + '</a></li>');
            } else {
                var id = "navbarDropdown" + link.titulo;
                menu.append('<li class="nav-item dropdown"><a class="nav-link dropdown-toggle  nav-link--cabecalho  dropdown-cabecalho" href= "#" id="' + id + '" data- toggle="dropdown" aria- haspopup="true" aria- expanded="false" >' + link.titulo + '</a ><div class="' + id + '  dropdown-menu dropdown-menu-right  dropdown-menu-cabecalho" aria-labelledby="' + id + '"></div>');
                link.itens.item.forEach(function (item) {
                    var classe = ".navbarDropdown" + link.titulo;

                    $('<a class="dropdown-item  dropdown-item-cabecalho" href="' + item.url + '">' + item.nomeSubmenu + '</a>').appendTo(classe);
                });
            }
        });
    }

    function onLinkErro() {
        console.log("Erro ao carregar menu principal.");
    }
});
