using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net.Mail; //Adicionei
using System.Net;

namespace portal.App_Code
{
    public class Util
    {
        private String _NomeCompleto;
        private String _Fone;
        private String _Email;
        private String _Assunto;
        private String _Mensagem;

        public String NomeCompleto
        {
            get
            {
                return _NomeCompleto;
            }

            set
            {
                _NomeCompleto = value;
            }
        }

        public String Fone
        {
            get
            {
                return _Fone;
            }

            set
            {
                _Fone = value;
            }
        }

        public String Email
        {
            get
            {
                return _Email;
            }

            set
            {
                _Email = value;
            }
        }

        public String Mensagem
        {
            get
            {
                return _Mensagem;
            }

            set
            {
                _Mensagem = value;
            }
        }

        public String Assunto
        {
            get
            {
                return _Assunto;
            }

            set
            {
                _Assunto = value;
            }
        }

        public void enviarEmail(Util email)
        {

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
        }

    }
}
