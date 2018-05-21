<?php
###################################################################################################################
//Gilberto Shimokawa Falcão - 01/05/2018
####################################################################################################################
//UTIL: Classe Genéric Static Singleton; Reutiliza métodos, usa email, uploads, Grava logins, etc.

namespace portal\App_Code {
//ATRIBUTOS----------------------------------------------------------------------------------------------------------		
    class Util {
        private $NomeCompleto;//String
        private $Fone;//Integer
        private $Email;//String
        private $Assunto;//String
        private $Mensagem;//String
//CONSTRUTOR----------------------------------------------------------------------------------------------------------			
		public function __construct($StringCompleteName,$IntFone,$StringEmail,$StringAssunto,$StringMensagem){
			$this -> NomeCompleto = $StringCompleteName;
			$this -> Fone = $IntFone;
			$this -> Email = $StringEmail;
			$this -> Assunto = $StringAssunto;
			$this -> Mensagem = $StringMensagem;
		}
//SETS-----------------------------------------------------------------------------------------------------------------
	public function setNomeCompleto_InString ($StringCompleteName){
		$this -> NomeCompleto = $StringCompleteName;
    }
	public function setFone_InInteger ($IntFone){
		$this -> Fone = $IntFone;
    }
	public function setEmail_InString ($StringEmail){
		$this -> Email = $StringEmail;
    }
	public function setAssunto_InString ($StringAssunto){
		$this -> Assunto = $StringAssunto;
    }
	public function setMensagem_InString ($StringMensagem){
		$this -> Mensagem = $StringMensagem;
    }
//GETS-----------------------------------------------------------------------------------------------------------------			
		public function getNomeCompleto_outString (){
			return $this -> NomeCompleto;
        }
		public function getFone_outInteger (){
			return $this -> Fone;
        }
		public function getEmail_outString (){
			return $this -> Email;
        }
		public function getAssunto_outString (){
			return $this -> Assunto;
        }
		public function getMensagem_outString (){
			return $this -> Mensagem;
        }
//---------------------------------------------------------------------------------------------------------------------		
		#ENVIO EMAIL? ######################################################################################################################
		 /* public void enviarEmail(Util email) {

            //Inicio do email
            MailAddress de = new MailAddress("fatecpwAds2016@outlook.com");
            MailAddress para = new MailAddress("fatecpwAds2016@outlook.com");

            MailMessage _email = new MailMessage();
            _email.From = de;
            _email.To.Add(para);
            _email.Subject =  email.Assunto;
            _email.Body = "Nome:" + email.NomeCompleto + " - Email:" + email.Email + " - Telefone: " + email.Fone + "\n - Mensagem: " + email.Mensagem;
            _email.IsBodyHtml = true;

            SmtpClient smtp = new SmtpClient("smtp-mail.outlook.com");
            try
            {
                smtp.Port = 587;
                smtp.EnableSsl = true;
                smtp.Credentials = new
                    NetworkCredential("fatecpwAds2016@outlook.com", "FreiJoao59");
                smtp.Send(_email);
                Console.Write("Email enviado com sucesso !");
            }
            catch
            {
                Console.Write("Ocorreu um erro no envio de email !");
            }
            //Fim do email
        }*/
		#######################################################################################################################
    }
}
?>
