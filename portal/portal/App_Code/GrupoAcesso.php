<?php
###################################################################################################################
//GRUPO ACESSO: Trabalha com páginas de acesso bem como composição das mesmas, Cada usuário acessa informações competentes a sua área.
####################################################################################################################

namespace portal\App_Code {
require_once("PaginaAcesso.php"); //pagina_acesso (MySQL)
    class GrupoAcesso {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------		
		private $codigo;
        private $nome;
		private $TipoStatus;//Inteiro -> 1 - Ativo, 0 - Inativo.
		private $PaginaAcesso = [];//Lista de objetos PaginaAcesso.php
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public function __construct(){}
		
		public function setGrupoAcesso($codigo,$nom,$TipoStatus){
			$this -> codigo = $codigo;
			$this -> nome = $nom;
			$this -> TipoStatus = $TipoStatus;
		}
		
		public function setGrupoAcessoComPaginas($codigo,$nom,$TipoStatus,$ListaDepagina){
			$this -> codigo = $codigo;
			$this -> nome = $nom;
			$this -> TipoStatus = $TipoStatus;
			$this -> PaginaAcesso = $ListaDepagina;
		}
//SETS-----------------------------------------------------------------------------------------------------------------        
		public function setCodigo($codigo){
			$this -> codigo = $codigo;
        }
        public function setNome($nom) {
			$this -> nome = $nom;
        }
        public function setTipoStatus($TipoStatus) {
			$this -> TipoStatus = $TipoStatus;
        }
        public function setListaPaginaAcesso($ListaPaginaAcesso) {
			$this -> PaginaAcesso = $ListaPaginaAcesso;
        }		
//GETS-----------------------------------------------------------------------------------------------------------------			
		public function getCodigo (){
			return $this -> codigo;
        }
        public function getNome(){
			return $this -> nome;
        }
        public function getTipoStatus() {
			return $this -> TipoStatus;
        }
        public function getListaPaginaAcesso() {
			return $this -> PaginaAcesso;
        }		
    }
}
?>