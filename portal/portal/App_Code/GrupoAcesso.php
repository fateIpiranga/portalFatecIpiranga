<?php
###################################################################################################################
//Gilberto Shimokawa Falcão - 30/04/2018
####################################################################################################################
//GRUPO ACESSO: Trabalha com páginas de acesso bem como composição das mesmas, Cada usuário acessa informações competentes a sua área.


namespace portal\App_Code {
require_once("PaginaAcesso.php");
    class GrupoAcesso {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------		
        private $codigo;//Double
        private $nome;//String
		private $TipoStatus;//Boolean true - Ativo, false - Inativo.
		private $PaginaAcesso;//OBJ PaginaAcesso.php
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public function __construct($DoubleCodigo,$StringNome,$BooleanTipoStatus, PaginaAcesso $pagina){
			$this -> codigo = $DoubleCodigo;
			$this -> nome = $StringNome;
			$this -> TipoStatus = $BooleanTipoStatus;
			$this -> PaginaAcesso = $pagina;
		}
//SETS-----------------------------------------------------------------------------------------------------------------        
		public function setCodigo_InDouble ($DoubleCodigo){
			$this -> codigo = $DoubleCodigo;
        }
        public function setNome_InString ($StringNome) {
			$this -> nome = $StringNome;
        }
        public function setTipoStatus_InBool ($BooleanTipoStatus) {
			$this -> TipoStatus = $BooleanTipoStatus;
        }
        public function setPaginaAcesso_OBJ ($OBJPaginaAcesso) {
			$this -> PaginaAcesso = $OBJPaginaAcesso;
        }		
//GETS-----------------------------------------------------------------------------------------------------------------			
		public function getCodigo_outDouble (){
			return $this -> codigo;
        }
        public function getNome_outString(){
			return $this -> nome;
        }
        public function getTipoStatus_outBool () {
			return $this -> TipoStatus;
        }
        public function getPaginaAcesso_OBJ () {
			return $this -> PaginaAcesso;
        }		
    }
}
?>