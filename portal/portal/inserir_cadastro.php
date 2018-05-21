<?php
    require("connection.php");
    

    if (isset($_POST["inputName"])){
        $nome = $_POST["inputName"];
        $sobrenome = $_POST["inputLastName"];
        $nomeCompleto = $nome . " " . $sobrenome;
        $email = $_POST["inputEmail1"];
        $senha = $_POST["inputPassword1"];
        $confirmaSenha = $_POST["confirmPassword"];
        $status = 1;
        $connect = BD_AbrirConexao();
        $verifEmail = "SELECT * FROM usuario WHERE email = '{$email}'";
        $access = mysqli_query($connect, $verifEmail);
        BD_FecharConexao($connect);
        if(!$access){
            die("Falha na consulta ao banco");
        }
        
        $result_query = mysqli_fetch_assoc ($access);
        if(empty($result_query)){
            $insertString = "INSERT INTO usuario ";
            $insertString .= "(nome, email, senha, status) ";
            $insertString .= "VALUES ";
            $insertString .= "('$nomeCompleto', '$email', '$senha', $status) ";

            $retorno = array();
            $connect = BD_AbrirConexao();
            $insert = mysqli_query($connect, $insertString);
            BD_FecharConexao($connect);
            if($insert){
                $retorno["sucesso"] = true;
                $retorno["mensagem"] = "Cadastro realizado com sucesso.";
            }else{
                $retorno["sucesso"] = false;
                $retorno["mensagem"] = "Falha no sistema, tente mais tarde.";
            }
        }else{
            $retorno["sucesso"] = false;
            $retorno["mensagem"] = "E-mail já cadastrado no sistema.";
        }
        
        echo json_encode($retorno);
    }

?>