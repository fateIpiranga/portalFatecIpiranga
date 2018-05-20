<?php
###################################################################################################################
//Gilberto Shimokawa Falcão - 05/05/2018
####################################################################################################################


namespace portal\App_Code {
//CADASTROS DE MENUS (menu arvore).
require_once("MenuItem.php");
    
    class Menu {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------
        private $codigo;//Double
        private $nome;//String
        private $TipoStatus;//Boolean true - Ativo, false - Inativo.
		private $Tipos;//String: Principal, MenuLateral, HotSite
		private $items = [];//Lista de Objeto MenuItem
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public function __construct($DoubleCodigo,$StringNome,$BooleanTipoStatus,$StringTipos){
			$this -> codigo = $DoubleCodigo;
			$this -> nome = $StringNome;
			$this -> TipoStatus = $BooleanTipoStatus;
			$this -> Tipos = $StringTipos;
			$this -> items [] = new MenuItem();
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
        public function setTipos_InString ($StringTipos) {
			$this -> Tipos = $StringTipos;
        }
        public function setItems_OBJ ($OBJ_MenuItem) {
			$this -> items [] = $OBJ_MenuItem;
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
        public function getTipos_outSting () {
			return $this -> Tipos;
        }		
        public function getItems_OBJ () {
			return $this -> items;
        }		
    }
}
?>