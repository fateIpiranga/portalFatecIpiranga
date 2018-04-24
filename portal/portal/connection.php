<?php
    $server = "baratheon0001.hospedagemdesites.ws";
    $user = "norto_fatecig";
    $pass = "freiJoao59";
    $db = "norton_fatecig";
    $connect = mysqli_connect($server, $user, $pass, $db);

    if(mysqli_connect_errno()){
        die("Conexao falhou: " . mysqli_connect_errno());
    }
?>