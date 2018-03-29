$(document).ready(function () {
    $("#rodape").load("rodape.html");

    $(".btn-pesquisar").click(function () {        
        window.location.replace("ResultadoBusca.html?p=" + $(".input-pesquisar").val());
    });

});


function queryString(parameter) {
    var loc = location.search.substring(1, location.search.length);
    var param_value = false;
    var params = loc.split("&");
    for (i = 0; i < params.length; i++) {
        param_name = params[i].substring(0, params[i].indexOf('='));
        if (param_name == parameter) {
            param_value = params[i].substring(params[i].indexOf('=') + 1)
        }
    }
    if (param_value) {
        return param_value;
    }
    else {
        return false;
    }
}