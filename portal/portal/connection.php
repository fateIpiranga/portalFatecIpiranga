<?php
    function BD_AbrirConexao(){
        //static $conexao;
        
        //if (!isset($conexao)){
            $server = "baratheon0001.hospedagemdesites.ws";
            $user = "norto_fatecig";
            $pass = "freiJoao59";
            $db = "norton_fatecig";
            $conexao = mysqli_connect($server, $user, $pass, $db);
        //}
        
        if($conexao == false){
            die("Conexao falhou: " . mysqli_connect_errno());
        }
        
        return $conexao;
    }

    function BD_FecharConexao(&$conexao){
        mysqli_close($conexao);
    }
?>