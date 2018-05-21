<?php
###################################################################################################################
//Gilberto Shimokawa Falcão - 30/04/2018
####################################################################################################################
/*CONTEÚDO: É todo o texto apresentado dentro do SITE, Apresentando conteúdo. Possui diversos formatos, tipos, palavra chaves, chamadas.*/



namespace portal\App_Code{
//INTANCIA DE SEGURANÇA ---------------------------------------------------------------------------------------------
require_once("Menu.php");
require_once ("Categoria.php");
    
	class Conteudo {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------
        private $codigo;//Double
        private $nome;//String
        private $titulo;//String
        private $descritivo;//String
        private $keywords;//String
		private $tipo;//String (Salva Strings: Destaque, Conteúdo, Notícia, DestaqueHotSite).
		private $dataPublicado;//String
		private $TipoStatus;//Boolean true - Ativo, False - Inativo.
		private $menuRelacionado;//Obj Menu.php
		private $listaCategoria;//Obj Categoria.php
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public function __construct($DoubleCodigo,$StringNome,$StringTitulo,$StringDescritivo,$StringKeywords,$StringTipo,$StringDataPublicado,$BoleanTipoStatus, Menu $menuRelacionado, Categoria $category){
			$this -> codigo = $DoubleCodigo;
			$this -> nome = $StringNome;
			$this -> titulo = $StringTitulo;
			$this -> descritivo = $StringDescritivo;
			$this -> keywords = $StringKeywords;
			$this -> tipo = $StringTipo;
			$this -> dataPublicado = $StringDataPublicado;
			$this -> TipoStatus = $BoleanTipoStatus;
			$this -> menuRelacionado = $menuRelacionado;
			$this-> listaCategoria = $category;
		}
//SETS-----------------------------------------------------------------------------------------------------------------
		public function setCodigo_InDouble ($DoubleCodigo){
			$this -> codigo = $DoubleCodigo;
		}
		public function setNome_InString ($StringNome){
			$this -> nome = $StringNome;
		}
		public function setTitulo_InString ($StringTitulo){
			$this -> titulo = $StringTitulo;
		}
		public function setDescritivo_InString ($StringDescritivo){
			$this -> descritivo = $StringDescritivo;
		}
		public function setKeywords_InString ($StringKeywords){
			$this -> keywords = $StringKeywords;
		}
		public function setTipo_InSelectedArrayToStringCast ($StringSelectArrayTipo){
			$this -> tipo = $StringSelectArrayTipo;//Refer. $Tipos Array
		}
		public function setDataPublicado_InString ($StringDataPublicado){
			$this -> dataPublicado = $StringDataPublicado;//Refer. $Tipos Array
		}
		public function setTipoStatus_InBool ($BooleanTipoStatus){
			$this -> TipoStatus = $BooleanTipoStatus;
		}
		public function setMenuRelacionado_OBJ ($OBJ_menuRelacionado){
			$this -> menuRelacionado = $OBJ_menuRelacionado;
		}	
		public function setListaCategoria_OBJ ($OBJ_listaCategoria){
			$this -> listaCategoria = $OBJ_listaCategoria;
		}		
//GETS-----------------------------------------------------------------------------------------------------------------		
		Public function getCodigo_outDouble (){
			return $this -> $codigo;
		}
		public function getNome_outString (){
			return $this -> nome;
		}
		public function getTitulo_outString (){
			return $this -> titulo;
		}
		public function getDescritivo_outString (){
			return $this -> descritivo;
		}
		public function getKeywords_outString (){
			return $this -> keywords;
		}
		public function getTipo_outString (){
			return $this -> tipo;//Refer. $Tipos Array
		}
		public function getDataPublicado_outString (){
			return $this -> dataPublicado;
		}
		public function getTipoStatus_outBool (){
			return $this -> TipoStatus;
		}
		public function getMenuRelacionado_OBJ (){
			return $this -> menuRelacionado;
		}	
		public function getListaCategoria_OBJ (){
			return $this -> listaCategoria;
		}		
	}	
}
?>