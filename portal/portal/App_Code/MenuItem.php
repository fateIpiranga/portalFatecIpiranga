<?php
###################################################################################################################
//Gilberto Shimokawa Falcão - 01/05/2018
####################################################################################################################
//Compõe o menu, são os links 
namespace portal\App_Code {
    class MenuItem {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------		
        private $codigo;//Double
        private $codigoMenu;//Double
        private $codigoItemPai;//Double
        private $codigoConteudo;//Double
        private $nome;//String
        private $url;//String
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public function __construct($DoubleCodigo,$DoubleCodigoMenu,$DoubleCodigoItemPai,$DoubleCodigoConteudo,$StringNome,$StringURL){
			$this -> codigo = $DoubleCodigo;
			$this -> codigoMenu = $DoubleCodigoMenu;
			$this -> codigoItemPai = $DoubleCodigoItemPai;
			$this -> codigoConteudo = $DoubleCodigoConteudo;
			$this -> nome = $StringNome;
			$this -> url = $StringURL;
		}
//SETS-----------------------------------------------------------------------------------------------------------------        
		public function setCodigo_InDouble ($DoubleCodigo){
			$this -> codigo = $DoubleCodigo;
        }
		public function setCodigoMenu_InDouble ($DoubleCodigoMenu){
			$this -> codigoMenu = $DoubleCodigoMenu;
        }
		public function setCodigoItemPai_InDouble ($DoubleCodigoItemPai){
			$this -> codigoItemPai = $DoubleCodigoItemPai;
        }
		public function setCodigoConteudo_InDouble ($DoubleCodigoConteudo){
			$this -> codigoConteudo = $DoubleCodigoConteudo;
        }
        public function setNome_InString ($StringNome) {
			$this -> nome = $StringNome;
        }
		public function setURL_InString ($StringURL) {
			$this -> url = $StringURL;
        }
//GETS-----------------------------------------------------------------------------------------------------------------		
		public function getCodigo_outDouble ($DoubleCodigo){
			return $this -> codigo;
        }
		public function getCodigoMenu_outDouble ($DoubleCodigoMenu){
			return $this -> codigoMenu;
        }
		public function getCodigoItemPai_outDouble ($DoubleCodigoItemPai){
			return $this -> codigoItemPai;
        }
		public function getCodigoConteudo_outDouble ($DoubleCodigoConteudo){
			return $this -> codigoConteudo;
        }
        public function getNome_outString ($StringNome) {
			return $this -> nome;
        }
		public function getURL_outString ($StringURL) {
			return $this -> url;
        }
    }
}
?>