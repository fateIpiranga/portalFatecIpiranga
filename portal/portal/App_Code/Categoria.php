<?php
####################################################################################################################
/* CATEGORIA: Classifica tipos de conteúdo competente de cada disciplina, "grupos de conteúdo". -> A Página é personalizada para aquele tipo de conteúdo. */
####################################################################################################################

namespace portal\App_Code {
	class Categoria {
		//ATRIBUTES----------------------------------------------------------------------
			//MySQL <~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~> IO
			private $codigo;
			private $nomeTipo;
			private $descritivo;
		//CONSTRUTOR---------------------------------------------------------------------
			public function __construct(){}
        
            public function  setCategoria ($cod,$nomTip,$desc){
				$this -> codigo = $cod;
                $this -> nomeTipo = $nomTip;
				$this -> descritivo= $desc;
			}
		//SETS---------------------------------------------------------------------------
			public function setCodigo($cod){
				$this -> codigo = $cod;
			}
			public function setNomeTipo($nomTip){
				$this -> nomeTipo = $nomTip;
			}			
			public function setDescritivo($desc){
				$this -> descritivo= $desc;
			}
		//GETS---------------------------------------------------------------------------
			public function getCodigo(){
				return $this -> codigo;
			}
			public function getNomeTipo(){
				return $this -> nomeTipo;
			}
			public function getDescritivo(){
				return $this -> descritivo;
			}
	}
}
?>
