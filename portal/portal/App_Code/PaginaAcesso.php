<?php
###################################################################################################################
/*PÁGINA AECESSO: Gerencia área administrativa
Ex: Descritivo, Posts, Implementa controle de acesso dos usuários, cadastrar novo usuário, Notícia, etc.*/
####################################################################################################################

namespace portal\App_Code {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------		
    class PaginaAcesso {
        private $codigo;
        private $nome;
        private $descritivo;
        private $pagina;
        private $TipoStatus; //1 - Ativo, 0 - Inativo.
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public function __construct (){}
        
        public function setPaginaAcesso($codigo,$nome,$descritivo,$pagina,$TipoStatus){
			$this -> codigo = $codigo;
			$this -> nome = $nome;
			$this -> descritivo = $descritivo;
			$this -> pagina = $pagina;
			$this -> TipoStatus = $TipoStatus;
		}
//SETS-----------------------------------------------------------------------------------------------------------------        
		public function setCodigo($codigo){
			$this -> codigo = $codigo;
        }
        public function setNome($nome) {
			$this -> nome = $nome;
        }
		public function setDescritivo($descritivo) {
			$this -> descritivo = $descritivo;
        }
		Public function setPagina($pagina) {
			$this -> pagina = $pagina;
        }
        public function setTipoStatus($TipoStatus) {
			$this -> TipoStatus = $TipoStatus;
        }
//GETS-----------------------------------------------------------------------------------------------------------------			
		public function getCodigo(){
			return $this -> codigo;
        }
        public function getNome(){
			return $this -> nome;
        }
        public function getDescritivo(){
			return $this -> descritivo;
        }	
        public function getPagina(){
			return $this -> pagina;
        }
        public function getTipoStatus() {
			return $this -> TipoStatus;
        }
    }
}

?>