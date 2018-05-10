<?php
###################################################################################################################
//Gilberto Shimokawa Falcão - 01/05/2018
####################################################################################################################
//LOG OPERAÇÃO: Guarda LOGS do sistema (Ações feitas por usuários).

namespace portal.App_Code {
    public class LogOperacao {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------		
        private $codigo;//Double
        private $tabela;//String
        private $codigoChave;//Double
        private $codigoUsuario;//Double
        private $data;//String
        private $tipoOperacao;//String (Inserir, Excluir, Alterar) <~ Operações do banco de dados.
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public __construct ($DoubleCodigo,$StringTable,$DoubleCodigoChave,$DoubleCodigoUsuario,$StringData,$StringTipoOperacao){
			$this -> codigo = $DoubleCodigo;
			$this -> tabela = $StringTable;
			$this -> codigoChave = $DoubleCodigoChave;
			$this -> codigoUsuario = $DoubleCodigoUsuario;
			$this -> data = $StringData;
			$this -> tipoOperacao = $StringTipoOperacao;			
		}
//SETS-----------------------------------------------------------------------------------------------------------------
		Public function setCodigo_InDouble ($DoubleCodigo){
			$this -> codigo = $DoubleCodigo;
		}
		Public function setTabela_InString ($StringTable){
			$this -> tabela = $StringTable;
		}
		Public function setCodigoChave_InDouble ($DoubleCodigoChave){
			$this -> codigoChave = $DoubleCodigoChave;
		}
		Public function setCodigoUsuario_InDouble ($DoubleCodigoUsuario){
			$this -> codigoUsuario= $DoubleCodigoUsuario;
		}
		Public function setData_InString ($StringData){
			$this -> data= $StringData;
		}	
		Public function setTipoOperacao_InString ($StringTipoOperacao){
			$this -> tipoOperacao = $StringTipoOperacao;
		}		
//GETS-----------------------------------------------------------------------------------------------------------------			
    	Public function getCodigo_outDouble (){
			return $this -> codigo;
		}
		Public function getTabela_outString (){
			return $this -> tabela;
		}
		Public function getCodigoChave_outDouble (){
			return $this -> codigoChave;
		}
		Public function getCodigoUsuario_outDouble (){
			return $this -> codigoUsuario;
		}
		Public function getData_outString (){
			return $this -> data;
		}	
		Public function getTipoOperacao_outString (){
			return $this -> tipoOperacao;
		}
	}
}
?>