<?php
###################################################################################################################
//USUÁRIO: Responsável pela área de acesso administrativa.
####################################################################################################################

namespace portal\App_Code {
require_once ("GrupoAcesso.php");
    class Usuario {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------		
        private $codigo;
        private $nome;
        private $email;
        private $senha;
		private $TipoStatus;// 1 - Ativo, 0 - Inativo.
		private $codigo_grupo_acesso;
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public function __construct (){}
        
        public function setUsuario($codigo,$nome,$mail,$senha,$tipoStatus,$codigo_grupo_acesso){
			$this -> codigo = $codigo;
			$this -> nome = $nome;
			$this -> email = $mail;
			$this -> senha = $senha;
			$this -> TipoStatus = $tipoStatus;
			$this -> codigo_grupo_acesso = $codigo_grupo_acesso;
		}			
//SETS-----------------------------------------------------------------------------------------------------------------        
		public function setCodigo($codigo){
			$this -> codigo = $codigo;
        }
		public function setNome($nome){
			$this -> nome = $nome;
		}
		public function setEmail($mail){
			$this -> email = $mail;
		}
		public function setSenha($senha){
			$this -> senha = $senha;
		}		
        public function setTipoStatus($tipoStatus) {
			$this -> TipoStatus = $tipoStatus;
        }		
        public function setCodigoGrupoAcesso($codigo_grupo_acesso) {
			$this -> codigo_grupo_acesso = $codigo_grupo_acesso;
        }
//GETS-----------------------------------------------------------------------------------------------------------------			
		public function getCodigo(){
			return $this -> codigo;
        }
        public function getNome() {
			return $this -> nome;
        }
        public function getEmail() {
			return $this -> email;
        }
        public function getSenha() {
			return $this -> senha;
        }
        public function getTipoStatus() {
			return $this -> TipoStatus;
        }
        public function getCodigoGrupoAcesso() {
			return $this -> codigo_grupo_acesso;
        }
    }
}
?>