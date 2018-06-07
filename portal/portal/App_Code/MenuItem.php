<?php
###################################################################################################################
//Compõe o menu, são os links
####################################################################################################################
 
namespace portal\App_Code {
    class MenuItem {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------		
        private $codigo;
        private $codigoMenu;
        private $codigoItemPai;
		private $nome;
        private $codigoConteudo;
        private $url;
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public function __construct (){}
        
        public function setMenuItem($codigo,$codigoMenu,$codigoItemPai,$nome,$codigoConteudo,$url){
			$this -> codigo = $codigo;
			$this -> codigoMenu = $codigoMenu;
			$this -> codigoItemPai = $codigoItemPai;
			$this -> codigoConteudo = $codigoConteudo;
			$this -> nome = $nome;
			$this -> url = $url;
		}
//SETS-----------------------------------------------------------------------------------------------------------------        
		public function setCodigo ($codigo){
			$this -> codigo = $codigo;
        }
		public function setCodigoMenu($codigoMenu){
			$this -> codigoMenu = $codigoMenu;
        }
		public function setCodigoItemPai($codigoItemPai){
			$this -> codigoItemPai = $codigoItemPai;
        }
		public function setCodigoConteudo($codigoConteudo){
			$this -> codigoConteudo = $codigoConteudo;
        }
        public function setNome($nome){
			$this -> nome = $nome;
        }
		public function setURL($url){
			$this -> url = $url;
        }
//GETS-----------------------------------------------------------------------------------------------------------------		
		public function getCodigo(){
			return $this -> codigo;
        }
		public function getCodigoMenu(){
			return $this -> codigoMenu;
        }
		public function getCodigoItemPai(){
			return $this -> codigoItemPai;
        }
		public function getCodigoConteudo(){
			return $this -> codigoConteudo;
        }
        public function getNome(){
			return $this -> nome;
        }
		public function getURL() {
			return $this -> url;
        }
    }
}
?>