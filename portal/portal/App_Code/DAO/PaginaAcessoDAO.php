<?php
namespace portal\App_Code\DAO {

//CHAMADAS EXTERNAS------------------------------------------------------------------------------------------------------------------------------
use portal\App_Code\PaginaAcesso;
mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);     

    try{
        require_once("/../PaginaAcesso.php");        
        require_once("/../../connection.php");        
    }catch(Exception $e){
		require_once (dirname(__file__, 2) . "\PaginaAcesso.php");
		require_once (dirname(__file__, 3) . "\connection.php");
    }

class PaginaAcessoDAO{
//INSERIR----------------------------------------------------------------------------------------------------------------------------------------
    function inserirPaginaAcesso($pg){
        try{
            $con = BD_AbrirConexao();
            $sql = "insert into pagina_acesso (nome, descritivo,pagina,status) values (' " .
                 $pg->getNome() . " ',' " .
                 $pg->getDescritivo() . " ',' " .
                 $pg->getPagina() . " ',' " .
                 $pg->getTipoStatus() . " ')";
                 mysqli_query($con,$sql);
				 echo "Inserção com sucesso!";		 
        }catch (Exception $e){
                echo "Erro de inserção: " . $e;
        }
    mysqli_close($con);	
	}

//ALTERAR--------------------------------------------------------------------------------------------------------------------------------------- 
function alterarPaginaAcesso($pg){  
        try{
            $con = BD_AbrirConexao();
            $sql = "update pagina_acesso set " . 
                "nome = ' " . $pg->getNome() . "', " .
                "descritivo = ' " . $pg->getDescritivo() . "', " .
                "pagina = ' " . $pg->getPagina() . "', " .
                "status = ' " . $pg->getTipoStatus() . "' " .
                "where codigo = " . $pg->getCodigo();
                mysqli_query($con,$sql);
				echo "Dados alterados com sucesso";
        }catch (Exception $e){
                echo "Erro ao alterar dados: " . $e;
                }
    mysqli_close($con);	
    }

//CARREGAR--------------------------------------------------------------------------------------------------------------------------------------
    function carregarPaginaAcesso ($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "select * from pagina_acesso where codigo = " . $codigo;
                $gargantula = mysqli_query($con,$sql);
                $pg = new PaginaAcesso();
                    if($carga = mysqli_fetch_array($gargantula)){
                        $pg->setPaginaAcesso(($carga["codigo"]),
											 ($carga["nome"]),
											 ($carga["descritivo"]),
											 ($carga["pagina"]),
											 ($carga["status"]));
						mysqli_close($con);
						return $pg;								 
                    }else{
                        echo "Registros não encontrados!";
                    }
            }catch (Exception $e){
                echo "Erro de busca: " . $e;
            }
	mysqli_close($con);			
    }

//CARREGAR LISTA DE PÁGINAS TIPO PaginaAcesso MODO 1-------------------------------------------------------------------------------------------
    function carregarListaPaginaAcesso($qtdOpcoes, $ordem){
        $sql = "select * from pagina_acesso where ";

        for ($i = 0 ; $i <= strlen((array)$qtdOpcoes) ; $i++){
            $sql = $sql . $qtdOpcoes[$i];
                if($i != $qtdOpcoes[$i] - 1){
                        $sql = $sql . "and ";  
                } 
        } 
        try{
            $con = BD_AbrirConexao();
            $gargantula = mysqli_query($con,$sql);
                    if($carga = mysqli_fetch_array($gargantula)){
                        $listaPaginaAcesso = [];
                        while($carga = mysqli_fetch_array($gargantula)){
                            $pg = new PaginaAcesso();
                            $pg->setPaginaAcesso(($carga["codigo"]),
											     ($carga["nome"]),
											     ($carga["descritivo"]),
											     ($carga["pagina"]),
											     ($carga["status"]));
                            $listaPaginaAcesso[] = $pg;
                        }
                        mysqli_close($con);
                        return $listaPaginaAcesso;
                    }else{
                        echo "Registros não encontrados!";
                    }
        }catch(Exception $e){
                echo "Erro de busca: " . $e;           
            }
mysqli_close($con);
    }
    
//CARREGAR LISTA DE PÁGINAS TIPO PaginaAcesso MODO 2-------------------------------------------------------------------------------------------
    function carregarListaPaginaAcessoCod($dado){
        try{
			$sql = "select t1.* from Pagina_Acesso t1,permissao_acesso t2 where t1.codigo_pagina = t2.codigo_grupo and t2.codigo_grupo= " . $dado;
            $con = BD_AbrirConexao();
            $gargantula = mysqli_query($con,$sql);
                if($carga = mysqli_fetch_array($gargantula)){
						  $listaPaginaAcesso = [];
                       while($carga = mysqli_fetch_array($gargantula)){
                             $pg = new PaginaAcesso();
                             $pg->setPaginaAcesso(($carga["codigo"]),
											     ($carga["nome"]),
											     ($carga["descritivo"]),
											     ($carga["pagina"]),
											     ($carga["status"]));
                            $listaPaginaAcesso[] = $pg;                
                        }
                    mysqli_close($con);
                    return $listaPaginaAcesso;                    
                }else {
                        echo "Registros não encontrados!";
                }
         }catch(Exception $e){
                echo "Erro ao carregar dados: " . $e;
         }
        mysqli_close($con);        
    }

//DELETAR----------------------------------------------------------------------------------------------------------------------------------------
    function deletarPaginaAcesso($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "delete from pagina_acesso where codigo = " . $codigo; 
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