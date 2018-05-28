<?php
namespace portal\App_Code\DAO {
    
//CHAMADAS EXTERNAS------------------------------------------------------------------------------------------------------------------------------

use portal\App_Code\Categoria;     
mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);

    try{
        require_once("/../Categoria.php");        
        require_once("/../../connection.php");        
    }catch(Exception $e){
        require_once (dirname(__file__, 2) . "\Categoria.php");
        require_once (dirname(__file__, 3) . "\connection.php");
    }
    
    class CategoriaDAO{	
//INSERIR----------------------------------------------------------------------------------------------------------------------------------------
    function inserirCategoria($Categoria){
        try{
            $con = BD_AbrirConexao();
            $sql = "insert into categoria (nome_tipo, descritivo) values (' " .
                 $Categoria->getNomeTipo() . " ',' " .
                 $Categoria->getDescritivo() . " ')";
                 mysqli_query($con,$sql);
				 echo "Inserção com sucesso!";
        }catch (Exception $e){
                echo "Erro de inserção: " . $e;
        }
    mysqli_close($con);
	}
//ALTERAR---------------------------------------------------------------------------------------------------------------------------------------
    function alterarCategoria($Categoria){  
        try{
            $con = BD_AbrirConexao();
            $sql = "update categoria set " . 
                "nome_tipo = ' " . $Categoria->getNomeTipo() . " ' ,
                descritivo = ' " . $Categoria->getDescritivo() . " ' 
                where codigo = " . $Categoria->getCodigo() ;
                mysqli_query($con,$sql);
				echo "Dados alterados com sucesso!";
        }catch (Exception $e){
                echo "Erro ao alterar dados: " . $e;
                }
    mysqli_close($con);	
    }

//CARREGA OBJETO-------------------------------------------------------------------------------------------------------------------------------
    function carregarCategoria ($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "select * from categoria where codigo = " . $codigo;
                $gargantula = mysqli_query($con,$sql);
                    if($carga = mysqli_fetch_array($gargantula)){
						$categoria = new Categoria();
                        $categoria->setCategoria(($carga["codigo"]),
												 ($carga["nome_tipo"]),
												 ($carga["descritivo"]));
                        mysqli_close($con);
                        return $categoria;
                    }else {
                        echo "Registros não encontrados!";
                    }
            }catch (Exception $e){
                echo "Erro de busca: " . $e;
            }
        mysqli_close($con);
    }

//CARREGA LISTA OBJETO 1----------------------------------------------------------------------------------------------------------------------

    function carregarListaCategorias($qtdOpcoes, $ordem){//qtdOpcoes = vetor | ordem = order by desc / asc
        
        $sql = "select * from categoria where ";
        
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
							 $listaCat = [];
                       while($carga = mysqli_fetch_array($gargantula)){
                             $categoria = new portal\App_Code\Categoria();
							 $categoria->setCategoria(($carga["codigo"]),
													  ($carga["nome_tipo"]),
													  ($carga["descritivo"]));
                             $listaCat[] = $categoria;
                       }
                       mysqli_close($con);
                       return $listaCat;
                    }else {
                        echo "Registros não encontrados!";
                     }
            }catch(Exception $e){
                echo "Erro ao carregar dados: " . $e;
            }
        mysqli_close($con);
    }

//CARREGA LISTA OBJETO 2----------------------------------------------------------------------------------------------------------------------
    function carregarListaCategoriaCod($dado){
        
        $sql = "select t1.* from categoria t1, conteudo_categoria t2 where t1.codigo = t2.codigo_categoria and t2.codigo_conteudo = " . $dado;
         
        try{
            $con = BD_AbrirConexao();
            $gargantula = mysqli_query($con,$sql);
                if($carga = mysqli_fetch_array($gargantula)){
						  $listaCat = [];
                       while($carga = mysqli_fetch_array($gargantula)){
                             $categoria = new portal\App_Code\Categoria();
							 $categoria->setCategoria(($carga["codigo"]),
													  ($carga["descritivo"]),
													  ($carga["nome_tipo"]));
                             $listaCat[] = $categoria;                      
                    }
                    mysqli_close($con);
                    return $listaCat;                    
                }else {
                        echo "Registros não encontrados!";
                }
         }catch(Exception $e){
                echo "Erro ao carregar dados: " . $e;
         }
        mysqli_close($con);        
    }

//DELETAR----------------------------------------------------------------------------------------------------------------------------------------
    function deletarCategoria($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "delete from categoria where codigo = " . $codigo; 
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