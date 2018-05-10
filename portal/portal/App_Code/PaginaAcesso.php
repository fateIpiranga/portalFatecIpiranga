<?php
###################################################################################################################
//Gilberto Shimokawa Falcão - 01/05/2018
####################################################################################################################
/*PÁGINA AECESSO: Gerencia área administrativa
Ex: Descritivo, Posts, Implementa controle de acesso dos usuários, cadastrar novo usuário, Notícia, etc.*/

namespace portal.App_Code {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------		
    public class PaginaAcesso {
        private $codigo;//Double
        private $nome;//String
        private $descritivo;//String
        private $pagina;//String
        private $TipoStatus;//Boolean true - Ativo, false - Inativo.
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public __construct($DoubleCodigo,$StringNome,$StringDescritivo,$StringPagina,$BooleanTipoStatus){
			$this -> codigo = $DoubleCodigo;
			$this -> nome = $StringNome;
			$this -> descritivo = $StringDescritivo;
			$this -> pagina = $StringPagina;
			$this -> TipoStatus = $BooleanTipoStatus;
		}
//SETS-----------------------------------------------------------------------------------------------------------------        
		public function setCodigo_InDouble ($DoubleCodigo){
			$this -> codigo = $DoubleCodigo;
        }
        public function setNome_InString ($StringNome) {
			$this -> nome = $StringNome;
        }
		public function setDescritivo_InString ($StringDescritivo) {
			$this -> descritivo = $StringDescritivo;
        }
		Public function setPagina_InString ($StringPagina) {
			$this -> pagina = $StringPagina;
        }
        public function setTipoStatus_InBool ($BooleanTipoStatus) {
			$this -> TipoStatus = $BooleanTipoStatus;
        }
//GETS-----------------------------------------------------------------------------------------------------------------			
		public function getCodigo_outDouble (){
			return $this -> codigo;
        }
        public function getNome_outString(){
			return $this -> nome;
        }
        public function getDescritivo_outString(){
			return $this -> descritivo;
        }	
        public function getPagina_outString(){
			return $this -> pagina;
        }
        public function getTipoStatus_outBool () {
			return $this -> TipoStatus;
        }	
    }
}

?>