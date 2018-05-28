<?php
###################################################################################################################
//UTIL: Classe Genéric Static Singleton; Reutiliza métodos, usa email, uploads, Grava logins, etc.
####################################################################################################################

namespace portal\App_Code {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------		
    class Util {
        private $NomeCompleto;
        private $Fone;
        private $Email;
        private $Assunto;
        private $Mensagem;
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public function __construct (){}
        
        public function setUtil($nomeCompleto,$fone,$email,$assunto,$mensagem){
			$this -> NomeCompleto = $nomeCompleto;
			$this -> Fone = $fone;
			$this -> Email = $email;
			$this -> Assunto = $assunto;
			$this -> Mensagem = $mensagem;
		}
//SETS-----------------------------------------------------------------------------------------------------------------
	public function setNomeCompleto($nomeCompleto){
		$this -> NomeCompleto = $nomeCompleto;
    }
	public function setFone($fone){
		$this -> Fone = $fone;
    }
	public function setEmail($email){
		$this -> Email = $email;
    }
	public function setAssunto($assunto){
		$this -> Assunto = $assunto;
    }
	public function setMensagem($mensagem){
		$this -> Mensagem = $mensagem;
    }
//GETS-----------------------------------------------------------------------------------------------------------------			
		public function getNomeCompleto(){
			return $this -> NomeCompleto;
        }
		public function getFone(){
			return $this -> Fone;
        }
		public function getEmail(){
			return $this -> Email;
        }
		public function getAssunto(){
			return $this -> Assunto;
        }
		public function getMensagem(){
			return $this -> Mensagem;
        }
//ENVIO DE EMAIL--------------------------------------------------------------------------------------------------------
        function enviarEmail($util) {         
            global $error;
            require_once(dirname(__FILE__,2) . "\phpmailerclass.phpmailer.php");
            
            //---CARGA-------------------------------------------------------------------------------------------------
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Host = 'smtp-mail.outlook.com';
            $mail->Port = 587;
            $mail->Username = 'fatecpwAds2016@outlook.com';
            $mail->Password = 'FreiJoao59';
            $mail->SetFrom('fatecpwAds2016@outlook.com', 'Fatec Pastor Eneas Toggini - Ipiranga');
            $mail->Subject = $util->getAssunto_outString();
            $mail->Body = $util->getMensagem_outString();
            $mail->AddAddress($util->getEmail_outString());
            //---------------------------------------------------------------------------------------------------------
            if(!$mail->Send()) {
                $error = 'Mail error: '.$mail->ErrorInfo;
                return false;
            } else {
                $error = 'Mensagem enviada!';
                return true;
            }
        }
    }
}
?>
