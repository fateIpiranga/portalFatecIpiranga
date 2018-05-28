<?php
namespace portal\App_Code\DAO {
//CHAMADAS EXTERNAS------------------------------------------------------------------------------------------------------------------------------
use portal\App_Code\MenuItem;
mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);     

    try{
        require_once("/../MenuItem.php");        
        require_once("/../../connection.php");        
    }catch(Exception $e){
		require_once (dirname(__file__, 2) . "\MenuItem.php");
		require_once (dirname(__file__, 3) . "\connection.php");
    }
	
class MenuItemDAO{
//CONSTRUTOR----------------------------------------------------------------------------------------------------------
	public function __construct (){}
//INSERIR---------------------------------------------------------------------------------------------------------------------------------------- 
    function inserirMenuItem($MenuItem){
        try{
            $con = BD_AbrirConexao();
            $sql = "insert into menu_item (codigo_menu, codigo_item_pai,nome,codigo_conteudo,url) values (' " .
                 $MenuItem->getCodigoMenu() . " ',' " .
                 $MenuItem->getCodigoItemPai() . " ',' " .
				 $MenuItem->getNome() . " ',' " .
                 $MenuItem->getCodigoConteudo() . " ',' " .
                 $MenuItem->getURL() . " ')";
                 mysqli_query($con,$sql);
                 echo "Inserção com sucesso!";
        }catch (Exception $e){
                echo "Erro de inserção: " . $e;
        }
    mysqli_close($con);	
    }
//ALTERAR--------------------------------------------------------------------------------------------------------------------------------------   
    function alterarMenuItem($MenuItem){  
        try{
            $con = BD_AbrirConexao();
            $sql = "update menu_item set " . 
                "codigo_menu = ' " . $MenuItem->getCodigoMenu() . "', " .
                "codigo_item_pai = ' " . $MenuItem->getCodigoItemPai() . "', " .
                "nome = ' " . $MenuItem->getNome() . "', " .
                "codigo_conteudo = ' " . $MenuItem->getCodigoConteudo() . "', " .
                "url = ' " . $MenuItem->getURL() . "' " .
                "where codigo = " . $MenuItem->getCodigo();
                mysqli_query($con,$sql);
                echo "Dados alterados com sucesso";
        }catch (Exception $e){
                echo "Erro ao alterar dados: " . $e;
                }
    mysqli_close($con);	
    }
//CARREGAR--------------------------------------------------------------------------------------------------------------------------------------
    function carregarMenuItem ($codigo){
            try {
				$sql = "select * from menu_item where codigo = " . $codigo;
                $con = BD_AbrirConexao();
                $gargantula = mysqli_query($con,$sql);
                    if($carga = mysqli_fetch_array($gargantula)){
                        $MenuItem = new MenuItem();
                        $MenuItem->setMenuItem(($carga["codigo"]),
                                               ($carga["codigo_menu"]),
                                               ($carga["codigo_item_pai"]),
                                               ($carga["nome"]),
                                               ($carga["codigo_conteudo"]),
                                               ($carga["url"]));
                        mysqli_close($con);
                        return $MenuItem;
                    }else{
                        echo "Registros não encontrados!";
                    }
            }catch (Exception $e){
                echo "Erro de busca: " . $e;
            }
        mysqli_close($con);
    }
        
//CARREGA LISTA DE MENU ITEM MODO 1 -----------------------------------------------------------------------------------------------------
    function carregarListaMenuItem($qtdOpcoes, $ordem){
        $sql = "select * from menu_item where ";
        
            for ($i = 0 ; $i <= strlen((array)$qtdOpcoes) ; $i++){
                $sql = $sql . $qtdOpcoes[$i];
                    if($i != $qtdOpcoes[$i] - 1){
                        $sql = $sql . "and ";  
                    }
                $sql = $sql . " order by " . $ordem;
                
                try{
                    $con = BD_AbrirConexao();
                    $gargantula = mysqli_query($con,$sql);                
                    if($carga = mysqli_fetch_array($gargantula)){
                       $listaMenuItem = [];
                        while($carga = mysqli_fetch_array($gargantula)){
                            $menu_item = new portal\App_Code\MenuItem();
                            $menu_item->setMenuItem(($carga["codigo"]),
                                               ($carga["codigo_menu"]),
                                               ($carga["codigo_item_pai"]),
                                               ($carga["nome"]),
                                               ($carga["codigo_conteudo"]),
                                               ($carga["url"]));
                            $listaMenuItem[] = $menu_item;
                        }
                        mysqli_close($con);
                        return $listaMenuItem;
                    }else{
                        echo "Registros não encontrados!";
                    }
                }catch (Exception $e){
                echo "Erro de busca: " . $e;           
            }
            mysqli_close($con);
            }
    }
//CARREGA LISTA DE MENU ITEM MODO 2 -----------------------------------------------------------------------------------------------------
    function carregarListaMenuItemCod($dado){
                try{
					$sql = $sql = "select * from menu_item where codigo_menu = " . $dado;
                    $con = BD_AbrirConexao();
                    $gargantula = mysqli_query($con,$sql);                
                    if($carga = mysqli_fetch_array($gargantula)){
                       $listaMenuItem = [];
                        while($carga = mysqli_fetch_array($gargantula)){
                            $menu_item = new portal\App_Code\MenuItem();
                            $menu_item->setMenuItem(($carga["codigo"]),
                                               ($carga["codigo_menu"]),
                                               ($carga["codigo_item_pai"]),
                                               ($carga["nome"]),
                                               ($carga["codigo_conteudo"]),
                                               ($carga["url"]));
                            $listaMenuItem[] = $menu_item;
                        }
                        mysqli_close($con);
                        return $listaMenuItem;
                    }else{
                        echo "Registros não encontrados!";
                    }
                }catch (Exception $e){
                echo "Erro de busca: " . $e;           
            }
            mysqli_close($con);
            }
    

//DELETAR----------------------------------------------------------------------------------------------------------------------------------------
    function deletarMenuItem($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "delete from menu_item where codigo = " . $codigo; 
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