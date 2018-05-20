<?php
###################################################################################################################
//Gilberto Shimokawa Falcão - 01/05/2018
####################################################################################################################
//SLIDES: Apresenta imagens, fotos relacionadas àquela noticia.

namespace portal\App_Code {
    class Slide {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------	
        private $codigo;//Double
        private $imagem;//String
        private $grupo;//String
        private $titulo;//String
        private $mensagem;//String
        private $url;//String
        private $TipoStatus;//Boolean true - Ativo, false - Inativo.
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public function __construct($DoubleCodigo,$StringImagem,$StringGrupo,$StringTitulo,$StringMensagem,$StringURL,$BooleanTipoStatus){
			$this -> codigo = $DoubleCodigo;
			$this -> imagem = $StringImagem;
			$this -> grupo = $StringGrupo;
			$this -> titulo = $StringTitulo;
			$this -> mensagem = $StringMensagem;
			$this -> url = $StringURL;
			$this -> TipoStatus = $BooleanTipoStatus;
		}
//SETS-----------------------------------------------------------------------------------------------------------------        
		public function setCodigo_InDouble ($DoubleCodigo){
			$this -> codigo = $DoubleCodigo;
        }
		public function setImagem_InString ($StringImagem){
			$this -> imagem = $StringImagem;
        }
		public function setGrupo_InString ($StringGrupo){
			$this -> grupo = $StringGrupo;
        }
		public function setTitulo_InString ($StringTitulo){
			$this -> titulo = $StringTitulo;
        }
		public function setMensagem_InString ($StringMensagem){
			$this -> mensagem = $StringMensagem;
        }
		public function setURL_InString ($StringURL) {
			$this -> url = $StringURL;
        }
		public function setTipoStatus_InBool ($BooleanTipoStatus){
			$this -> TipoStatus = $BooleanTipoStatus;
		}
//GETS-----------------------------------------------------------------------------------------------------------------			
		public function getCodigo_outDouble (){
			return $this -> codigo;
        }
		public function getImagem_outString (){
			return $this -> imagem;
        }
		public function getGrupo_outString ($StringGrupo){
			return $this -> grupo;
        }
		public function getTitulo_outString ($StringTitulo){
			return $this -> titulo;
        }
		public function getMensagem_outString ($StringMensagem){
			return $this -> mensagem;
        }
		public function getURL_outString () {
			return $this -> url;
        }
        public function getTipoStatus_outBool () {
			return $this -> TipoStatus;
        }
    }
}
?>