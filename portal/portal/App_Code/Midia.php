<?php
###################################################################################################################
/*MÍDIA: Gerencia Arquivos que estão feitos Uploads.
EX: POWER POINT, DOC, EXCEL, PPT, ETC SEAO OS ADMS QUE FAZEM ESSES UPLOADS.*/
####################################################################################################################

namespace portal\App_Code {
    class Midia {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------				
        private $codigo;
        private $nome;
        private $url;
        private $data;
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public function __construct (){}
        
        public function setMidia($codigo,$nome,$URL,$data){
			$this -> codigo = $codigo;
			$this -> nome = $nome;
			$this -> url = $URL;
			$this -> data = $data;
		}
//SETS-----------------------------------------------------------------------------------------------------------------        
		public function setCodigo($codigo){
			$this -> codigo = $codigo;
        }
        public function setNome($nome) {
			$this -> nome = $nome;
        }
		public function setURL($URL) {
			$this -> url = $URL;
        }
		public function setData($data) {
			$this -> data = $data;
        }
//GETS-----------------------------------------------------------------------------------------------------------------				
		public function getCodigo(){
			return $this -> codigo;
        }
        public function getNome() {
			return $this -> nome;
        }
		public function getURL() {
			return $this -> url;
        }
		public function getData() {
			return $this -> data;
        }	
    }
}
?>