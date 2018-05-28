<?php
namespace portal\App_Code\DAO {
    
//CHAMADAS EXTERNAS------------------------------------------------------------------------------------------------------------------------------
use portal\App_Code\GrupoAcesso;
use portal\App_Code\PaginaAcesso;
use portal\App_Code\DAO\PaginaAcessoDAO;
mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);

    try{
		require_once("/../GrupoAcesso.php");  
        require_once("/../PaginaAcesso.php");        
        require_once("/../../connection.php");        
    }catch(Exception $e){
		require_once (dirname(__file__, 2) . "\GrupoAcesso.php");
		require_once (dirname(__file__, 2) . "\PaginaAcesso.php");
		require_once (dirname(__file__, 3) . "\connection.php");
    }

class GrupoAcessoDAO{
//INSERIR----------------------------------------------------------------------------------------------------------------------------------------
    function inserirGrupoAcesso($groupAcess){
        try{
            $con = BD_AbrirConexao();
            $sql = "insert into grupo_acesso (nome,status) values (' " .
				 $groupAcess->getNome() . " ', " .
                 $groupAcess->getTipoStatus() . ")";
                 mysqli_query($con, $sql);
                 echo "Inserção com sucesso!";
        }catch (Exception $e){
                echo "Erro de inserção: " . $e;
        }
    mysqli_close($con);	
		}

//ALTERAR---------------------------------------------------------------------------------------------------------------------------------------
    function alterarGrupoAcesso($groupAcess){  
        try{
            $con = BD_AbrirConexao();
            $sql = "update grupo_acesso set " . 
                "nome = ' " . $groupAcess->getNome() . "', " .
                "status = " . $groupAcess->getTipoStatus() .
                " where codigo = " . $groupAcess->getCodigo();
                mysqli_query($con,$sql);
				echo "Dados alterados com sucesso";
        }catch (Exception $e){
                echo "Erro ao alterar dados: " . $e;
                }
    mysqli_close($con);	
    }

//CARREGAR--------------------------------------------------------------------------------------------------------------------------------------
function carregarGrupoAcesso($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "select * from grupo_acesso where codigo = " . $codigo;
                $gargantula = mysqli_query($con,$sql);
                $gpAcess = new GrupoAcesso();				
                    if($carga = mysqli_fetch_array($gargantula)){
                        $gpAcess->setGrupoAcesso(($carga["codigo"]),
												 ($carga["nome"]),
												 ($carga["status"]));
						mysqli_close($con);
						return $gpAcess;
                    }else{
                        echo "Registros não encontrados!";
                    }
            }catch (Exception $e){
                echo "Erro de busca: " . $e;             
            }
       mysqli_close($con);
    }

    function carregarGrupoAcessoComPaginas($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "select * from grupo_acesso where codigo = " . $codigo;
                $gargantula = mysqli_query($con,$sql);
                    if($carga = mysqli_fetch_array($gargantula)){
					   $gpAcess = new GrupoAcesso();
				       $daoPagina = new PaginaAcessoDAO();
                       $gpAcess->setGrupoAcessoComPaginas(($carga["codigo"]),
												          ($carga["nome"]),
														  ($carga["status"]),
														  ($daoPagina->carregarListaPaginaAcessoCod($codigo)));
						mysqli_close($con);
						return $gpAcess;
                    }else{
                        echo "Registros não encontrados!";
                    }
            }catch (Exception $e){
                echo "Erro de busca: " . $e;             
            }
       mysqli_close($con);
    }

//CARREGAR LISTA PÁGINA ACESSOS------------------------------------------------------------------------------------------------------------------
    function carregaListaGrupoAcesso($qtdOpcoes, $ordem){                
            $sql = "select * from grupo_acesso where ";           
            
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
							  $ListaPaginaAcesso = [];
							  $daoPagina = new PaginaAcessoDAO();
                        while($carga = mysqli_fetch_array($gargantula)){
                              $gpAcess = new GrupoAcesso();
                              $gpAcess->setCodigo($carga["codigo"]);
                              $gpAcess->setNome($carga["nome"]);
                              $gpAcess->setTipoStatus($carga["status"]);
                              $gpAcess->setListaPaginaAcesso($daoPagina->carregarListaPaginaAcessoCod($codigo));
                              $ListaPaginaAcesso[] = $gpAcess;
                         }
                        mysqli_close($con);
                        return $ListaPaginaAcesso;
                    }else{
                        echo "Registros não encontrados!";
                    }
        }catch(Exception $e){
                echo "Erro de busca: " . $e;           
            }
mysqli_close($con); 
    }

//DELETAR----------------------------------------------------------------------------------------------------------------------------------------
    function deletarGrupoAcesso($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "delete from grupo_acesso where codigo = " . $codigo; 
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