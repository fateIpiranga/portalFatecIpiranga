<?php
require_once ("../Categoria.php");
require_once ("../../connection.php");

    function inserirCategoria(Categoria $OBJ_Categoria){
        try{
            $con = BD_AbrirConexao();
            $sql = "insert into categoria values (' " .
                 $OBJ_Categoria->getCodigo_outDouble() . " ', ' " .
                 $OBJ_Categoria->getDescritivo_outString() . " ',' " .
                 $OBJ_Categoria->getNomeTipo_outString() . " ')";
                 mysqli_query($con,$sql);
        }catch (Exception $e){
                echo "Erro de inserção: " . $e;
                mysqli_close($con);
                exit;
        }
    echo "Inserção com sucesso!";
    mysqli_close($con);	
		}
    
    function alterarCategoria(Categoria $OBJ_Categoria){  
        try{
            $con = BD_ArbirConexao();
            $sql = "update categoria set descritivo = ' " . $OBJ_Categoria->getDescritivo_outString() . "', " .
                "nome_tipo = ' " . $OBJ_Categoria->getNomeTipo_outString() . "' " .
                "where codigo = " . $OBJ_Categoria->getCodigo_outDouble();
                mysqli_query($con,$sql);
        }catch (Exception $e){
                echo "Erro ao alterar dados: " . $e;
                mysqli_close($con);
                exit;
                }
    echo "Dados alterados com sucesso";
    mysqli_close($con);	
    }

    function carregarCategoria ($doubleCodigo){
            try {
                $con = BD_ArbirConexao();
                $sql = "select * from categoria where codigo = " . $doubleCodigo;
                $gargantula = mysqli_query($con,$sql);
                $categoria = new Categoria();
                    if($carga = mysqli_fetch_array($gargantula)){
                        $categoria->setCodigo_InDouble($carga["codigo"]);
                        $categoria->setDescritivo_InString($carga["descritivo"]);
                        $categoria->setNomeTipo_InString($carga["nome_tipo"]);
                    }else{
                        echo "Registros não encontrados!";
                    }
            }catch (Exception $e){
                echo "Erro de busca: " . $e;
                mysqli_close($con);
                exit;                
            }
        mysqli_close($con);
        return $categoria;
    }

    function deletarCategoria($doubleCodigo){
            try {
                $con = BD_ArbirConexao();
                $sql = "delete from categoria where codigo = " . $doubleCodigo; 
                $carga = mysqli_query ();
            }catch(Exception $e){
                echo "Erro de exclusão: " . $e;
                mysqli_close($con);
                exit;                
            }
        echo "Excluído com sucesso!";
        mysqli_close($con);
    }
?>