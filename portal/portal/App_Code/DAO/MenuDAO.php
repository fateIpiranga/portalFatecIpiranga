<?php
namespace portal\App_Code\DAO {
//CHAMADAS EXTERNAS------------------------------------------------------------------------------------------------------------------------------

use portal\App_Code\Menu;
mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);

    try{
        require_once("/../Menu.php");        
        require_once("/../../connection.php");        
    }catch(Exception $e){
		require_once (dirname(__file__, 2) . "\Menu.php");
        require_once (dirname(__file__, 3) . "\connection.php");
    }

class MenuDAO{
//INSERIR----------------------------------------------------------------------------------------------------------------------------------------
    function inserirMenu($menu){
        try{
            $con = BD_AbrirConexao();
            $sql = "insert into menu (nome, tipo, status) values (' " .
                 $menu->getNome() . " ', " .
                 $menu->getTipos() . " , " .
                 $menu->getTipoStatus() . " ) ";
                 mysqli_query($con,$sql);
				 echo "Inserção com sucesso!";
        }catch (Exception $e){
                echo "Erro de inserção: " . $e;
        }
    mysqli_close($con);	
		}
//ALTERAR---------------------------------------------------------------------------------------------------------------------------------------
    function alterarMenu($menu){  
        try{
            $con = BD_AbrirConexao();
            $sql = "update menu set " . 
                "nome = ' " . $menu->getNome() . "', " .
                "tipo = " . $menu->getTipos() . " ," .
                "status = " . $menu->getTipoStatus() .
                " where codigo = " . $menu->getCodigo();
                mysqli_query($con,$sql);
				echo "Dados alterados com sucesso";
        }catch (Exception $e){
                echo "Erro ao alterar dados: " . $e;
                }
    mysqli_close($con);	
    }

//CARREGAR--------------------------------------------------------------------------------------------------------------------------------------
    function carregarMenu ($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "select * from menu where codigo = " . $codigo;
                $gargantula = mysqli_query($con,$sql);
                $menu = new Menu();
                    if($carga = mysqli_fetch_array($gargantula)){
                        $menu->setCodigo($carga["codigo"]);
                        $menu->setNome($carga["nome"]);
                        $menu->setTipos($carga["tipo"]);
                        $menu->setTipoStatus($carga["status"]);
						mysqli_close($con);
						return $menu;
                    }else{
                        echo "Registros não encontrados!";
                    }
            }catch (Exception $e){
                echo "Erro de busca: " . $e;
            }
mysqli_close($con);
    }

//CARREGA LISTA MENU ITEM----------------------------------------------------------------------------------------------------------------------
    function carregaListaMenu($qtdOpcoes, $ordem){
        $sql = "select * from menu where ";
        
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
                   $listaMenu = [];
                        while($carga = mysqli_fetch_array($gargantula)){
                              $Menu = new Menu();
                              $Menu->setmenu(($carga["codigo"]),
                                             ($carga["nome"]),
                                             ($carga["status"]),
                                             ($carga["tipo"]),
                                             carregarListaMenuItemCod($Menu->getCodigo()));
                            $listaMenu = $Menu;
                        }
                    mysqli_close($con);
                    return $listaMenu;
                }
        }catch(Exception $e){
                echo "Erro ao carregar dados: " . $e;
            }
        mysqli_close($con);
    }

//CARREGA LISTA MENU ITEM VIA COD--------------------------------------------------------------------------------------------------------------
    function carregaListaMenuCod($dado){
		try{
			$sql = $sql = "select * from menu where codigo = " . $dado;
            $con = BD_AbrirConexao();
            $gargantula = mysqli_query($con,$sql);
				if($carga = mysqli_fetch_array($gargantula)){
					$listaMenu = [];
                      while($carga = mysqli_fetch_array($gargantula)){
						  $Menu = new Menu();
                                    $Menu->setmenu(($carga["codigo"]),
                                                   ($carga["nome"]),
                                                   ($carga["status"]),
                                                   ($carga["tipo"]),
                                                    carregarListaMenuItemCod($Menu->getCodigo()));
                            $listaMenu[] = $Menu;
					  }
					mysqli_close($con);
                    return $listaMenu;
				}else{
                        echo "Registros não encontrados!";
                    }
		}catch(Exception $e){
			echo "Erro de busca: " . $e;  
		}
		mysqli_close($con);
	}

//DELETAR----------------------------------------------------------------------------------------------------------------------------------------
    function deletarMenu($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "delete from menu where codigo = " . $codigo; 
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