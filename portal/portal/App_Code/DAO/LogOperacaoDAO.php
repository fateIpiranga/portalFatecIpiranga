<?php
namespace portal\App_Code\DAO {
//CHAMADAS EXTERNAS------------------------------------------------------------------------------------------------------------------------------
    
use portal\App_Code\LogOperacao;     
mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);
	
	try{
            require_once("/../LogOperacao.php");        
            require_once("/../../connection.php");        
    }catch(Exception $e){
            require_once (dirname(__file__, 2) . "\LogOperacao.php");
            require_once (dirname(__file__, 3) . "\connection.php");
    }

class LogOperacaoDAO{
//INSERIR----------------------------------------------------------------------------------------------------------------------------------------
    function inserirLogOperacao($log){
        try{
            $con = BD_AbrirConexao();
            $sql = "insert into log_operacao (tabela,codigo_chave,codigo_usuario,data_operacao,tipo_operacao) values (' " .
                 $log->getTabela() . " ',' " .
                 $log->getCodigoChave() . " ',' " .
                 $log->getCodigoUsuario() . " ',' " .
                 $log->getData() . " ',' " .
                 $log->getTipoOperacao() . " ') " ; 
                mysqli_query($con,$sql);
        }catch (Exception $e){
                echo "Erro de inserção: " . $e;
                mysqli_close($con);
                exit;
        }
    echo "Inserção feita com sucesso!";
    mysqli_close($con);	
		}

//ALTERAR---------------------------------------------------------------------------------------------------------------------------------------
    function alterarLogOperacao($log){  
        try{
            $con = BD_AbrirConexao();
            $sql = "update log_operacao set " . 
                "tabela = ' " . $log->getTabela() . " ', " . 
                "codigo_chave = ' " . $log->getCodigoChave() . "', " . 
                "codigo_usuario = ' " . $log->getCodigoUsuario() . "', " .
                "data_operacao = ' " . $log->getData() . " ', " .
                "tipo_operacao = ' " . $log->getTipoOperacao() . " ' " .
                "where codigo = " . $log->getCodigo();
                mysqli_query($con,$sql);
        }catch (Exception $e){
                echo "Erro ao alterar dados: " . $e;
                mysqli_close($con);
                exit;
                }
    echo "Dados alterados com sucesso";
    mysqli_close($con);	
    }

//CARREGAR--------------------------------------------------------------------------------------------------------------------------------------
    function carregarLogOperacao ($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "select * from log_operacao where codigo = " . $codigo;
                $gargantula = mysqli_query($con,$sql);
                $Ulog = new LogOperacao();
                    if($carga = mysqli_fetch_array($gargantula)){
                        $Ulog->setCodigo($carga["codigo"]);
                        $Ulog->setTabela($carga["tabela"]);
                        $Ulog->setCodigoChave($carga["codigo_chave"]);
                        $Ulog->setCodigoUsuario($carga["codigo_usuario"]);
                        $Ulog->setData($carga["data_operacao"]);
                        $Ulog->setTipoOperacao($carga["tipo_operacao"]);
                    }else{
                        echo "Registros não encontrados!";
                    }
            }catch (Exception $e){
                echo "Erro de busca: " . $e;
                mysqli_close($con);
                exit;                
            }
        mysqli_close($con);
        return $Ulog;
    }

//CARREGA LISTA DE LOGS------------------------------------------------------------------------------------------------------------------------
    function carregarListaLogs($qtdOpcoes, $ordem){
            $sql = "select * from log_operacao where ";
                    
            for ($i = 0 ; $i <= strlen((array)$qtdOpcoes) ; $i++ ){
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
                       $listaLog = [];
                            while($carga = mysqli_fetch_array($gargantula)){
                                  $logg = new LogOperacao();
                                  $logg->setLog(($carga["codigo"]),
                                                ($carga["tabela"]),
                                                ($carga["codigo_chave"]),
                                                ($carga["codigo_usuario"]),
                                                ($carga["data_operacao"]),
                                                ($carga["tipo_operacao"]));
                                  $listaLog[] = $logg;
                            }
                        mysqli_close($con);
                        return $listaLog;
                    }else{
                        echo "Registros não encontrados!";
                    }
            }catch(Exception $e){
                echo "Erro ao carregar dados: " . $e;
            }
        mysqli_close($con);
    }

//DELETAR----------------------------------------------------------------------------------------------------------------------------------------
    function deletarLogOperacao($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "delete from log_operacao where codigo = " . $codigo; 
                $carga = mysqli_query ($con,$sql);
            }catch(Exception $e){
                echo "Erro de exclusão: " . $e;
                mysqli_close($con);
                exit;                
            }
        echo "Exclusão com sucesso";
        mysqli_close($con);
    }
  }
}
?>