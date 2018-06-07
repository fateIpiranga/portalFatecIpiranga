<?php
namespace portal\App_Code\DAO {

//CHAMADAS EXTERNAS------------------------------------------------------------------------------------------------------------------------------
use portal\App_Code\Slide;
mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);     

    try{
        require_once("/../Slide.php");        
        require_once("/../../connection.php");        
    }catch(Exception $e){
		require_once (dirname(__file__, 2) . "\Slide.php");
		require_once (dirname(__file__, 3) . "\connection.php");
    }

class SlideDAO{
//INSERIR--------------------------------------------------------------------------------------------------------------------------------------
function inserirSlide($slide){
        try{
            $con = BD_AbrirConexao();
            $sql = "insert into slide (imagem, titulo, mensagem, url, grupo, status) values (' " .
                 $slide->getImagem() . " ',' " .
                 $slide->getTitulo() . " ',' " .
                 $slide->getMensagem() . " ',' " .
                 $slide->getURL() . " ',' " .
                 $slide->getGrupo() . " ', " .
                 $slide->getTipoStatus() . " )";
                 mysqli_query($con,$sql);
                 echo "Inserção com sucesso!";
        }catch (Exception $e){
                echo "Erro de inserção: " . $e;
        }
    mysqli_close($con);	
}

//ALTERAR---------------------------------------------------------------------------------------------------------------------------------------
    function alterarSlide($slide){  
        try{
            $con = BD_AbrirConexao();
            $sql = "update slide set " . 
                "imagem = ' " . $slide->getImagem() . "', " .
                "grupo = ' " . $slide->getGrupo() . "', " .
                "titulo = ' " . $slide->getTitulo() . "', " .
                "mensagem = ' " . $slide->getMensagem() . "', " .
                "url = ' " . $slide->getURL() . "', " .
                "status =  " . $slide->getTipoStatus() . " " .
                "where codigo = " . $slide->getCodigo();
                mysqli_query($con,$sql);
                echo "Dados alterados com sucesso";
        }catch (Exception $e){
                echo "Erro ao alterar dados: " . $e;
                }    
    mysqli_close($con);	
    }

//CARREGAR--------------------------------------------------------------------------------------------------------------------------------------
    function carregarSlide ($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "select * from slide where codigo = " . $codigo;
                $gargantula = mysqli_query($con,$sql);
                $slider = new Slide();
                    if($carga = mysqli_fetch_array($gargantula)){
                        $slider->setSlide(($carga["codigo"]),
                                          ($carga["imagem"]),
                                          ($carga["grupo"]),
                                          ($carga["titulo"]),
                                          ($carga["mensagem"]),
                                          ($carga["url"]),
                                          ($carga["status"]));
                        mysqli_close($con);
                        return $slider;
                    }else{
                        echo "Registros não encontrados!";
                    }
            }catch (Exception $e){
                echo "Erro de busca: " . $e;            
            }
mysqli_close($con);
    }

//CARREGAR LISTA---------------------------------------------------------------------------------------------------------------------------------
    function carregarListaSlide($qtdOpcoes, $ordem){
        $sql = "select * from slide where ";
        
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
                   $listaSlide = [];
                        while($carga = mysqli_fetch_array($gargantula)){
                              $slider = new Slide();
                              $slider->setSlide(($carga["codigo"]),
                                                ($carga["imagem"]),
                                                ($carga["grupo"]),
                                                ($carga["titulo"]),
                                                ($carga["mensagem"]),
                                                ($carga["url"]),
                                                ($carga["status"]));
                              $listaSlide[] = $slider;
                        }
                    mysqli_close($con); 
                    return $listaSlide;
                }
        }catch(Exception $e){
                echo "Erro ao carregar dados: " . $e;
            }
        mysqli_close($con);        
    }

//DELETAR----------------------------------------------------------------------------------------------------------------------------------------
    function deletarSlide($codigo){
            try {
                $con = BD_AbrirConexao();
                $sql = "delete from slide where codigo = " . $codigo; 
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