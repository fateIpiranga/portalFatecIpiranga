<?php
###################################################################################################################
/*CONTEÚDO: É todo o texto apresentado dentro do SITE, Apresentando conteúdo. Possui diversos formatos, tipos, palavra chaves, chamadas.*/
####################################################################################################################

namespace portal\App_Code{
//INTANCIA DE SEGURANÇA ---------------------------------------------------------------------------------------------
require_once("Menu.php");
require_once ("Categoria.php");
	class Conteudo {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------
		private $codigo;
        private $nome;
        private $titulo;
        private $descritivo;
        private $TipoStatus; // 1-Ativo ; 0-Inativo
        private $keywords;
		private $tipo;//1- Destaque, 2- Conteúdo, 3- Notícia, 4- DestaqueHotSite).
		private $dataPublicado;
		private $menuRelacionado;//Obj Menu.php
		private $listaCategoria = [];//Lista de Objeto Categoria.php
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public function __construct(){}
		
		public function setConteudoArray($codigo,$nome,$titulo,$descritivo,$TipoStatus,$keywords,$tipo,$data_publicado,Menu $menuRelacionado,$category){
			$this -> codigo = $codigo;
			$this -> nome = $nome;
			$this -> titulo = $titulo;
			$this -> descritivo = $descritivo;
			$this -> keywords = $keywords;
			$this -> tipo = $tipo;
			$this -> dataPublicado = $data_publicado;
			$this -> TipoStatus = $TipoStatus;
			$this -> menuRelacionado = $menuRelacionado;
			$this-> listaCategoria[] = $category;
		}
		
		public function setConteudo($codigo,$nome,$titulo,$descritivo,$TipoStatus,$keywords,$tipo,$data_publicado,$menuRelacionado){
			$this -> codigo = $codigo;
			$this -> nome = $nome;
			$this -> titulo = $titulo;
			$this -> descritivo = $descritivo;
			$this -> keywords = $keywords;
			$this -> tipo = $tipo;
			$this -> dataPublicado = $data_publicado;
			$this -> TipoStatus = $TipoStatus;
			$this -> menuRelacionado = $menuRelacionado;
		}
//SETS-----------------------------------------------------------------------------------------------------------------
		public function setCodigo ($codigo){
			$this -> codigo = $codigo;
		}
		public function setNome ($nome){
			$this -> nome = $nome;
		}
		public function setTitulo ($titulo){
			$this -> titulo = $titulo;
		}
		public function setDescritivo ($descritivo){
			$this -> descritivo = $descritivo;
		}
		public function setKeywords ($keywords){
			$this -> keywords = $keywords;
		}
		public function setTipo ($tipo){
			$this -> tipo = $tipo;//Refer. $Tipos Array
		}
		public function setDataPublicado ($data_publicado){
			$this -> dataPublicado = $data_publicado;//Refer. $Tipos Array
		}
		public function setTipoStatus($TipoStatus){
			$this -> TipoStatus = $BooleanTipoStatus;
		}
		public function setMenuRelacionado ($menuRelacionado){
			$this -> menuRelacionado = $menuRelacionado;
		}	
		public function setListaCategoria ($category){
			$this -> listaCategoria = $category;
		}		
//GETS-----------------------------------------------------------------------------------------------------------------		
		Public function getCodigo (){
			return $this -> codigo;
		}
		public function getNome(){
			return $this -> nome;
		}
		public function getTitulo(){
			return $this -> titulo;
		}
		public function getDescritivo (){
			return $this -> descritivo;
		}
		public function getKeywords (){
			return $this -> keywords;
		}
		public function getTipo (){
			return $this -> tipo;
		}
		public function getDataPublicado (){
			return $this -> dataPublicado;
		}
		public function getTipoStatus (){
			return $this -> TipoStatus;
		}
		public function getMenuRelacionado(){
			return $this -> menuRelacionado;
		}	
		public function getListaCategoria(){
			return $this -> listaCategoria;
		}		
	}	
}
?>