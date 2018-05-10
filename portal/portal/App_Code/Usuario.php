<?php
###################################################################################################################
//Gilberto Shimokawa Falcão - 01/05/2018
####################################################################################################################
//USUÁRIO: Responsável pela área de acesso administrativa.

require ("GrupoAcesso.php");

namespace portal.App_Code {
    public class Usuario {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------		
        private $codigo;//Double
        private $nome;//String
        private $email;//String
        private $senha;//String
		private $TipoStatus;//Boolean true - Ativo, false - Inativo.
		private $AcessGroup;//OBJ GrupoAcesso
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public __construct($DoubleCodigo,$StringNome,$StringEmail,$StringSenha,$BooleanTipoStatus){
			$this -> codigo = $DoubleCodigo;
			$this -> nome = $StringNome;
			$this -> email = $StringEmail;
			$this -> senha = $StringSenha;
			$this -> TipoStatus = $BooleanTipoStatus;
			$this -> AcessGroup = new GrupoAcesso();
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