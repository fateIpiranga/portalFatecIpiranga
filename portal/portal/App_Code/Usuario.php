<?php
###################################################################################################################
//Gilberto Shimokawa Falcão - 01/05/2018
####################################################################################################################
//USUÁRIO: Responsável pela área de acesso administrativa.



namespace portal\App_Code {
require_once ("GrupoAcesso.php");
    class Usuario {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------		
        private $codigo;//Double
        private $nome;//String
        private $email;//String
        private $senha;//String
		private $TipoStatus;//Boolean true - Ativo, false - Inativo.
		private $AcessGroup;//OBJ GrupoAcesso
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public function __construct($DoubleCodigo,$StringNome,$StringEmail,$StringSenha,$BooleanTipoStatus, GrupoAcesso $acessGroup){
			$this -> codigo = $DoubleCodigo;
			$this -> nome = $StringNome;
			$this -> email = $StringEmail;
			$this -> senha = $StringSenha;
			$this -> TipoStatus = $BooleanTipoStatus;
			$this -> AcessGroup = $acessGroup;
		}			
//SETS-----------------------------------------------------------------------------------------------------------------        
		public function setCodigo_InDouble ($DoubleCodigo){
			$this -> codigo = $DoubleCodigo;
        }
		public function setNome_InString ($StringNome){
			$this -> nome = $StringNome;
		}
		public function setEmail_InString ($StringEmail){
			$this -> email = $StringEmail;
		}
		public function setSenha_InString ($StringSenha){
			$this -> senha = $StringSenha;
		}		
        public function setTipoStatus_InBool ($BooleanTipoStatus) {
			$this -> TipoStatus = $BooleanTipoStatus;
        }		
        public function setGrupoAcesso_OBJ ($OBJ_GrupoAcesso) {
			$this -> AcessGroup = $OBJ_GrupoAcesso;
        }
//GETS-----------------------------------------------------------------------------------------------------------------			
		public function getCodigo_outDouble (){
			return $this -> codigo;
        }
        public function getNome_outString () {
			return $this -> nome;
        }
        public function getEmail_outString () {
			return $this -> email;
        }
        public function getSenha_outString () {
			return $this -> senha;
        }
        public function getTipoStatus_outBool () {
			return $this -> TipoStatus;
        }
        public function getGrupoAcesso_OBJ () {
			return $this -> AcessGroup;
        }
    }
}
?>