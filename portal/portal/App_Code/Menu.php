<?php
###################################################################################################################
//CADASTROS DE MENUS (menu arvore).
####################################################################################################################

namespace portal\App_Code {
require_once("MenuItem.php");
    
    class Menu {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------
        private $codigo;
        private $nome;
        private $Tipos;// 1-  Principal, 2- MenuLateral, 3- HotSite
        private $TipoStatus;// 1 - Ativo, 0 - Inativo.
		private $items = [];//Lista de Objeto MenuItem
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public function __construct(){}

        public function setMenu($codigo,$nome,$TipoStatus,$tipos){
			$this -> codigo = $codigo;
			$this -> nome = $nome;
			$this -> TipoStatus = $TipoStatus;
			$this -> Tipos = $tipos;
		}        

        public function setMenuComLista($codigo,$nome,$TipoStatus,$tipos,$menuItem){
			$this -> codigo = $codigo;
			$this -> nome = $nome;
			$this -> TipoStatus = $TipoStatus;
			$this -> Tipos = $tipos;
			$this -> items= (array)$menuItem;
		}
//SETS-----------------------------------------------------------------------------------------------------------------        
		public function setCodigo($codigo){
			$this -> codigo = $codigo;
        }
        public function setNome($nome) {
			$this -> nome = $nome;
        }
        public function setTipoStatus($TipoStatus) {
			$this -> TipoStatus = $TipoStatus;
        }
        public function setTipos($tipos) {
			$this -> Tipos = $tipos;
        }
        public function setItems($MenuItem) {
			$this -> items[] = (array)$MenuItem;
        }
//GETS-----------------------------------------------------------------------------------------------------------------			
		public function getCodigo(){
			return $this -> codigo;
        }
        public function getNome(){
			return $this -> nome;
        }
        public function getTipoStatus() {
			return $this -> TipoStatus;
        }
        public function getTipos() {
			return $this -> Tipos;
        }		
        public function getItems() {
			return $this -> items;
        }		
    }
}
?>