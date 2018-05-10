<?php
###################################################################################################################
//Gilberto Shimokawa Falcão - 30/04/2018
####################################################################################################################
/* CATEGORIA: Classifica tipos de conteúdo competente de cada disciplina, "grupos de conteúdo". -> A Página é personalizada para aquele tipo de conteúdo. */

namespace portal.App_Code {
	public class Categoria {
		//ATRIBUTES----------------------------------------------------------------------
			private $codigo;//Double
			private $descritivo;//String
			private $nomeTipo;//String
		//CONSTRUTOR---------------------------------------------------------------------
			public function  __construct ($DoubleCodigo,$StringDescritivo,$StringNomeTipo){
				$this -> codigo = $DoubleCodigo;
				$this -> descritivo= $StringDescritivo;
				$this -> nomeTipo = $StringNomeTipo;
			}
		//SETS---------------------------------------------------------------------------
			public function setCodigo_InDouble($DoubleCodigo){
				$this -> codigo = $DoubleCodigo;
			}
			public function setDescritivo_InString($StringDescritivo){
				$this -> descritivo= $StringDescritivo;
			}
			public function setNomeTipo_InString($StringNomeTipo){
				$this -> nomeTipo = $StringNomeTipo;
			}
		//GETS---------------------------------------------------------------------------
			public function getCodigo_outDouble(){
				return $this -> codigo;
			}
			public function getDescritivo_outString(){
				return $this -> descritivo;
			}
			public function getNomeTipo_outString(){
				return $this -> nomeTipo;
			}
	}
}
?>
