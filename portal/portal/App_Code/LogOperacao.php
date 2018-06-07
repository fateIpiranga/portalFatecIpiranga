<?php
###################################################################################################################
//LOG OPERAÇÃO: Guarda LOGS do sistema (Ações feitas por usuários).
####################################################################################################################

namespace portal\App_Code {
    class LogOperacao {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------		
        private $codigo;
        private $tabela;//String
        private $codigoChave;
        private $codigoUsuario;
        private $data;//String
        private $tipoOperacao;//(1-Inserir, 2-Excluir, 3-Alterar) 
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public function __construct (){}
        
        public function setLogOperacao($codigo,$tabela,$codigoChave,$codigoUsuario,$data,$tipoOperacao){
			$this -> codigo = $codigo;
			$this -> tabela = $tabela;
			$this -> codigoChave = $codigoChave;
			$this -> codigoUsuario = $codigoUsuario;
			$this -> data = $data;
			$this -> tipoOperacao = $tipoOperacao;			
		}
//SETS-----------------------------------------------------------------------------------------------------------------
		Public function setCodigo ($codigo){
			$this -> codigo = $codigo;
		}
		Public function setTabela($tabela){
			$this -> tabela = $tabela;
		}
		Public function setCodigoChave($codigoChave){
			$this -> codigoChave = $codigoChave;
		}
		Public function setCodigoUsuario($codigoUsuario){
			$this -> codigoUsuario= $codigoUsuario;
		}
		Public function setData ($data){
			$this -> data= $data;
		}	
		Public function setTipoOperacao($tipoOperacao){
			$this -> tipoOperacao = $tipoOperacao;
		}		
//GETS-----------------------------------------------------------------------------------------------------------------			
    	Public function getCodigo(){
			return $this -> codigo;
		}
		Public function getTabela(){
			return $this -> tabela;
		}
		Public function getCodigoChave(){
			return $this -> codigoChave;
		}
		Public function getCodigoUsuario(){
			return $this -> codigoUsuario;
		}
		Public function getData(){
			return $this -> data;
		}	
		Public function getTipoOperacao(){
			return $this -> tipoOperacao;
		}
	}
}
?>