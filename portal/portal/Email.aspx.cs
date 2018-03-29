using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using portal.App_Code;
namespace portal
{
    public partial class Email : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            
            String nome = Request["Nome"];
            String fone = Request["Fone"];
            String endEmail = Request["Email"];
            String assunto = Request["Assunto"];
            String mensagem = Request["Mensagem"];
            Util email = new Util();
            email.NomeCompleto = nome;
            email.Email = endEmail;
            email.Fone = fone;
            email.Assunto = assunto;
            email.Mensagem = mensagem;
            email.enviarEmail(email);

            //Response.Redirect("contact.html?msg=" + );
        }
    }
}