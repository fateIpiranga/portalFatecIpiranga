using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using portal.App_Code.DAO;
using portal.App_Code;

namespace portal
{
    public partial class teste : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            UsuarioDAO dao = new UsuarioDAO();
            Usuario usuario = dao.carregar(1);
            Response.Write(usuario.Email + "<br>" + usuario.Nome);
        }
    }
}