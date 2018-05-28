<?php
namespace portal\App_Code\DAO {
//CHAMADAS EXTERNAS------------------------------------------------------------------------------------------------------------------------------
use portal\App_Code\Midia;
mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);     

    try{
        require_once("/../Midia.php");        
        require_once("/../../connection.php");  
    }catch(Exception $e){
        require_once (dirname(__file__, 2) . "\Midia.php");
        require_once (dirname(__file__, 3) . "\connection.php");   
    }

class MidiaDAO{

//INSERIR----------------------------------------------------------------------------------------------------------------------------------------
function inserirMidia($midia){
        try{
            $con = BD_AbrirConexao();
            $sql = "insert into midia (nome, url, data_publicado) values (' " .
                 $midia->getNome() . " ',' " .
                 $midia->getURL() . " ',' " .
                 $midia->getData() . " ')";
                 mysqli_query($con,$sql);
                 echo "Inserção com sucesso!";
        }catch (Exception $e){
                echo "Erro de inserção: " . $e;
        }
    mysqli_close($con);	
}

//ALTERAR--------------------------------------------------------------------------------------------------------------------------------------
function alterarMidia($midia){  
        try{
            $con = BD_AbrirConexao();
            $sql = "update midia set " . 
                "nome = ' " . $midia->getNome() . "', " .
                "url = ' " . $midia->getURL() . "', " .
                "data_publicado = '" . $midia->getData() . "' ";
                mysqli_query($con,$sql);
                echo "Dados alterados com sucesso";
        }catch (Exception $e){
                echo "Erro ao alterar dados: " . $e;
                }
    mysqli_close($con);	
    }

//CARREGAR--------------------------------------------------------------------------------------------------------------------------------------
    function carregarMidia ($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "select * from midia where codigo = " . $codigo;
                $gargantula = mysqli_query($con,$sql);
                    if($carga = mysqli_fetch_array($gargantula)){
                        $Mid = new Midia();
                        $Mid->setMidia(($carga["codigo"]),
                                       ($carga["nome"]),
                                       ($carga["url"]),
                                       ($carga["data_publicado"]));
                        mysqli_close($con);
                        return $Mid;
                    }else{
                        echo "Registros não encontrados!";
                    }
            }catch (Exception $e){
                echo "Erro de busca: " . $e;  
            }
        mysqli_close($con);
    }

//CARREGAR LISTA DE MÍDIAS-----------------------------------------------------------------------------------------------------------------------
    function carregarListaMidia($qtdOpcoes, $ordem){
           $sql = "select * from midia where "; 
        
             for ($i = 0 ; $i <= strlen((array)$qtdOpcoes) ; $i++){
                 $sql = $sql . $qtdOpcoes[$i];
                    if($i != $qtdOpcoes[$i] - 1){
                        $sql = $sql . "and ";  
                    } 
            }
        
            $sql = $sql . " order by " . $ordem;
        
        try{
            $con = BD_AbrirConexao();
            $gargantula = mysqli_query($con,$sql);                
            if($carga = mysqli_fetch_array($gargantula)){
							  $ListaMidia = [];
                        while($carga = mysqli_fetch_array($gargantula)){
                              $midia = new portal\App_Code\Midia();
                              $midia->setMidia(($carga["codigo"]),
                                                 ($carga["nome"]),
                                                 ($carga["url"]),
                                                 ($carga["data_publicado"]));
                              $ListaMidia[] = $midia;
                         }
                        mysqli_close($con);
                        return $ListaMidia;
                    }else{
                        echo "Registros não encontrados!";
                    }
        }catch(Exception $e){
                echo "Erro de busca: " . $e;           
            }
mysqli_close($con);        
    }

//DELETAR----------------------------------------------------------------------------------------------------------------------------------------
    function deletarMidia($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "delete from midia where codigo = " . $codigo; 
                $carga = mysqli_query ($con,$sql);
                echo "Exclusão com sucesso";
            }catch(Exception $e){
                echo "Erro de exclusão: " . $e;            
            }
        mysqli_close($con);
    }
  }
}
?>