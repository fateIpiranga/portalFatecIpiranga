<?php
###################################################################################################################
//SLIDES: Apresenta imagens, fotos relacionadas àquela noticia.
####################################################################################################################

namespace portal\App_Code {
    class Slide {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------	
        private $codigo;
        private $imagem;//string
        private $titulo;
        private $mensagem;
        private $url;
        private $grupo;
        private $TipoStatus;// 1 - Ativo, 0 - Inativo.
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public function __construct (){}
        
        public function setSlide($codigo,$img,$titulo,$mensagem,$URL,$grupo,$TipoStatus){
			$this -> codigo = $codigo;
			$this -> imagem = $img;
			$this -> grupo = $grupo;
			$this -> titulo = $titulo;
			$this -> mensagem = $mensagem;
			$this -> url = $URL;
			$this -> TipoStatus = $TipoStatus;
		}
//SETS-----------------------------------------------------------------------------------------------------------------        
		public function setCodigo($codigo){
			$this -> codigo = $codigo;
        }
		public function setImagem($img){
			$this -> imagem = $img;
        }
		public function setGrupo($grupo){
			$this -> grupo = $grupo;
        }
		public function setTitulo($titulo){
			$this -> titulo = $titulo;
        }
		public function setMensagem($mensagem){
			$this -> mensagem = $mensagem;
        }
		public function setURL($URL) {
			$this -> url = $URL;
        }
		public function setTipoStatus($TipoStatus){
			$this -> TipoStatus = $TipoStatus;
		}
//GETS-----------------------------------------------------------------------------------------------------------------			
		public function getCodigo(){
			return $this -> codigo;
        }
		public function getImagem(){
			return $this -> imagem;
        }
		public function getGrupo(){
			return $this -> grupo;
        }
		public function getTitulo(){
			return $this -> titulo;
        }
		public function getMensagem(){
			return $this -> mensagem;
        }
		public function getURL() {
			return $this -> url;
        }
        public function getTipoStatus() {
			return $this -> TipoStatus;
        }
    }
}
?>