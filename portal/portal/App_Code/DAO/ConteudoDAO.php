<?php
namespace portal\App_Code\DAO {
    
//CHAMADAS EXTERNAS------------------------------------------------------------------------------------------------------------------------------
use portal\App_Code\DAO\MenuDAO;
use portal\App_Code\DAO\CategoriaDAO;
use portal\App_Code\Conteudo;
mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);

    try{
		require_once("MenuDAO.php");    
		require_once("CategoriaDAO.php");    
        require_once("/../Conteudo.php");        
        require_once("/../../connection.php");        
    }catch(Exception $e){
		require_once (dirname(__file__, 1) . "\MenuDAO.php");
		require_once (dirname(__file__, 1) . "\CategoriaDAO.php");
		require_once (dirname(__file__, 2) . "\Conteudo.php");
		require_once (dirname(__file__, 3) . "\connection.php");
    }
    
 class ConteudoDAO{
//INSERIR----------------------------------------------------------------------------------------------------------------------------------------
    function inserirConteudo($Conteudo){
        try{
            $con = BD_AbrirConexao();
            $sql = "insert into conteudo (nome, titulo,conteudo,status,keywords,tipo,data_publicado,codigo_menu) values (' " .
                 $Conteudo->getNome() . " ' , ' " .
                 $Conteudo->getTitulo() . " ' , ' " .
                 $Conteudo->getDescritivo() . " ' ,  " .
                 $Conteudo->getTipoStatus() . "  , ' " .
                 $Conteudo->getKeywords() . " ' ,  " .
                 $Conteudo->getTipo() . " , '" .
                 $Conteudo->getDataPublicado() . " ' , " . 
				 $Conteudo->getMenuRelacionado() . " ) ";
                 #$Conteudo->getMenuRelacionado()->getCodigo() . " ) ";
                 mysqli_query($con,$sql);
				 echo "Inserção com sucesso!";
        }catch (Exception $e){
                echo "Erro de inserção: " . $e;
        }
    mysqli_close($con);	
	}

//ALTERAR---------------------------------------------------------------------------------------------------------------------------------------
    function alterarConteudo($Conteudo){  
        try{
            $con = BD_AbrirConexao();
            $sql = "update conteudo set " . 
                "nome = ' " . $Conteudo->getNome() . " ' , " .
                "titulo = '" . $Conteudo->getTitulo() . " ' , " .
                "conteudo = '" . $Conteudo->getDescritivo() . " ' , " .
                "status = " . $Conteudo->getTipoStatus() . " , " .
                "keywords = '" . $Conteudo->getKeywords() . " ' , " . 
                "tipo = " . $Conteudo->getTipo() . " , " .
                "data_publicado = '" . $Conteudo->getDataPublicado() . " ' , " .
                "codigo_menu = " . $Conteudo->getMenuRelacionado() . #->getCodigo() .
                " where codigo = " . $Conteudo->getCodigo();
                mysqli_query($con,$sql);
				echo "Dados alterados com sucesso";
        }catch (Exception $e){
                echo "Erro ao alterar dados: " . $e;
                }
    mysqli_close($con);	
    }

//CARREGAR OBJETO CONTEUDO-----------------------------------------------------------------------------------------------------------------------
    function carregarConteudo ($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "select * from conteudo where codigo = " . $codigo;
                $gargantula = mysqli_query($con,$sql);
                    if($carga = mysqli_fetch_array($gargantula)){
						$contents = new Conteudo();
						$contents->setConteudo(($carga["codigo"]),
											   ($carga["nome"]),
											   ($carga["titulo"]),
											   ($carga["conteudo"]),
											   ($carga["status"]),
											   ($carga["keywords"]),
											   ($carga["tipo"]),
											   ($carga["data_publicado"]),
											   ($carga["codigo_menu"]));
						mysqli_close($con);
						return $contents;
					}else{
                        echo "Registros não encontrados!";
                    }
            }catch (Exception $e){
                echo "Erro de busca: " . $e;
            }
        mysqli_close($con);
    }
//------------------------------------------------------------------------------------------------------------------	
    function carregarConteudoComArray ($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "select * from conteudo where codigo = " . $codigo;
                
                $gargantula = mysqli_query($con,$sql);
                    if($carga = mysqli_fetch_array($gargantula)){
						$contents = new Conteudo();
						$contents->setConteudo(($$carga["codigo"]),
											   ($carga["nome"]),
											   ($carga["titulo"]),
											   ($carga["conteudo"]),
											   ($carga["status"]),
											   ($carga["keywords"]),
											   ($carga["tipo"]),
											   ($carga["data_publicado"]),
											   (carregarMenu($carga["codigo_menu"])),//Trazer retorno do objeto Menu.
                                               (carregarListaCategoriaCod($codigo))); //Retorna lista de objetos Categoria
						mysqli_close($con);
						return $contents;
					}else{
                        echo "Registros não encontrados!";
                    }
            }catch (Exception $e){
                echo "Erro de busca: " . $e;
            }
        mysqli_close($con);
    }

//CARREGAR LISTA DE OBJETOS CONTEÚDO----------------------------------------------------------------------------------------------------------
     function carregarListaConteudo($qtdOpcoes, $ordem){
            $sql = "select * from conteudo where ";   
            
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
                        $listaConteudo = [];
                        while($carga = mysqli_fetch_array($gargantula)){
						$contents = new Conteudo();
						$contents->setConteudo(($carga["codigo"]),
											   ($carga["nome"]),
											   ($carga["titulo"]),
											   ($carga["conteudo"]),
											   ($carga["keywords"]),
											   ($carga["tipo"]),
											   ($carga["data_publicado"]),
											   ($carga["status"]),
											   (carregarMenu($carga["codigo_menu"])),//Trazer retorno do objeto Menu.
                                               (carregarListaCategoriaCod($codigo))); //Retorna lista de objetos Categoria
                              $listaConteudo[] = $contents;
                         }
                        mysqli_close($con);
                        return $listaConteudo;
                    }else{
                        echo "Registros não encontrados!";
                    }
            }catch (Exception $e){
                echo "Erro de busca: " . $e;           
            }
mysqli_close($con);
     }
                                        
//DELETAR----------------------------------------------------------------------------------------------------------------------------------------
    function deletarConteudo($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "delete from conteudo where codigo = " . $codigo; 
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