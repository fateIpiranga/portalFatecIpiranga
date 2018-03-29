using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using portal.App_Code.DAO;
using portal.App_Code;

namespace portal.admin
{
    public partial class menu : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            if(!IsPostBack)
            {
                CarregarConteudo();
            }
        }

        private void CarregarConteudo()
        {
            MenuDAO oDAO = new MenuDAO();
            String[] filtros = new String[1];
            filtros[0] = "";
            if(txtPesquisar.Text.Length > 0)
            {
                filtros[0] = " nome like '%" + txtPesquisar.Text + "%' "; 
            }
            List<App_Code.Menu> menus = oDAO.carregarLista(filtros,"nome");
            GridView1.DataSource = menus;
            GridView1.DataBind();      
            
            if(GridView1.Rows.Count <= 0)
            {
                lblMensagem.Text = "Registros não Encontrados";
            }      
        }

        protected void CriarNovo(object sender, EventArgs e)
        {
            Response.Redirect("menuCrud.aspx");
        }
    }
}