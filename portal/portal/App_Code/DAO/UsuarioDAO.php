<?php
namespace portal\App_Code\DAO {
    
//CHAMADAS EXTERNAS------------------------------------------------------------------------------------------------------------------------------
use portal\App_Code\Usuario;     
mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);

    try{
        require_once("/../Usuario.php");        
        require_once("/../../connection.php");        
    }catch(Exception $e){
		require_once (dirname(__file__, 2) . "\Usuario.php");
		require_once (dirname(__file__, 3) . "\connection.php");
    }
	
class UsuarioDAO{
//INSERIR----------------------------------------------------------------------------------------------------------------------------------------
    function inserirUsuario($User){
        try{
            $con = BD_AbrirConexao();
            $sql = "insert into usuario (nome, email, senha, status, codigo_grupo_acesso) values ( ' " .
                 $User->getNome() . " ' , ' " .
                 $User->getEmail() . " ' , ' " .
                 $User->getSenha() . " ' , " .
                 $User->getTipoStatus() . " , " .
                 $User->getCodigoGrupoAcesso() . " ) ";
                 mysqli_query($con,$sql);
                 echo "Inserção com sucesso!";
        }catch (Exception $e){
                echo "Erro de inserção: " . $e;
        }
    mysqli_close($con);	
		}
//ALTERAR---------------------------------------------------------------------------------------------------------------------------------------
    function alterarUsuario($User){  
        try{
            $con = BD_AbrirConexao();
            $sql = "update usuario set " . 
                "nome = ' " . $User->getNome() . " ' , " .
                "email = ' " . $User->getEmail() . " ' , " .
                "senha = ' " . $User->getSenha() . " ' , " .
                "status = " . $User->getTipoStatus() . " , " .
                "codigo_grupo_acesso = " . $User->getCodigoGrupoAcesso() .
                " where codigo = " . $User->getCodigo();
                mysqli_query($con,$sql);
                echo "Dados alterados com sucesso";
        }catch (Exception $e){
                echo "Erro ao alterar dados: " . $e;
                }
    mysqli_close($con);	
    }

//CARREGAR--------------------------------------------------------------------------------------------------------------------------------------
    function carregarUsuario ($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "select * from usuario where codigo = " . $codigo;
                $gargantula = mysqli_query($con,$sql);
                    if($carga = mysqli_fetch_array($gargantula)){
                        $User = new Usuario();
                        $User->setCodigo($carga["codigo"]);
                        $User->setNome($carga["nome"]);
                        $User->setEmail($carga["email"]);
                        $User->setSenha($carga["senha"]);
                        $User->setTipoStatus($carga["status"]);
                        $User->setCodigoGrupoAcesso($carga["codigo_grupo_acesso"]);
                        mysqli_close($con);
                        return $User;
                    }else{
                        echo "Registros não encontrados!";
                    }
            }catch (Exception $e){
                echo "Erro de busca: " . $e;     
            }
        mysqli_close($con);        
    }
//CARREGAR LISTA USUÁRIO---------------------------------------------------------------------------------------------------------------------    
    function carregarListaUsuario($qtdOpcoes, $ordem){
        $sql = "select * from usuario where ";   
            
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
                        $listaUsuario = [];
                        while($carga = mysqli_fetch_array($gargantula)){
						$user = new Usuario();
						$user->setUsuario(($carga["codigo"]),
                                          ($carga["nome"]),
                                          ($carga["email"]),
                                          ($carga["senha"]),
                                          ($carga["status"]),
                                          ($carga["codigo_grupo_acesso"]));
                         $listaUsuario[] = $user;
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
    function deletarUsuario($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "delete from usuario where codigo = " . $codigo; 
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