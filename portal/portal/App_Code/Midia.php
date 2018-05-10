<?php
###################################################################################################################
//Gilberto Shimokawa Falcão - 01/05/2018
####################################################################################################################
/*MÍDIA: Gerencia Arquivos que estão feitos Uploads.
EX: POWER POINT, DOC, EXCEL, PPT, ETC SEAO OS ADMS QUE FAZEM ESSES UPLOADS.*/

namespace portal.App_Code {
    public class Midia {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------				
        private $codigo;//Double
        private $nome;//String
        private $url;//String
        private $data;//String
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public __construct($DoubleCodigo,$StringNome,$StringURL,$StringData){
			$this -> codigo = $DoubleCodigo;
			$this -> nome = $StringNome;
			$this -> url = $StringURL;
			$this -> data = $StringData;
		}
//SETS-----------------------------------------------------------------------------------------------------------------        
		public function setCodigo_InDouble ($DoubleCodigo){
			$this -> codigo = $DoubleCodigo;
        }
        public function setNome_InString ($StringNome) {
			$this -> nome = $StringNome;
        }
		public function setURL_InString ($StringURL) {
			$this -> url = $StringURL;
        }
		public function setData_InString ($StringData) {
			$this -> data = $StringData;
        }
//GETS-----------------------------------------------------------------------------------------------------------------				
		public function getCodigo_outDouble (){
			return $this -> codigo;
        }
        public function getNome_outString () {
			return $this -> nome;
        }
		public function getURL_outString () {
			return $this -> url;
        }
		public function getData_outString () {
			return $this -> data;
        }	
    }
}
?>