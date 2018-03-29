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
    public partial class menuCrud : System.Web.UI.Page
    {
        double codigo=0;
        protected void Page_Load(object sender, EventArgs e)
        {
            if(!IsPostBack)
            {
                carregar();             
            }
        }

        private void carregar()
        {
            codigo = 0;
            if (Request["codigo"] != null) codigo = Convert.ToDouble(Request["codigo"]);
            if (codigo == 0)
            {
                UpdatePanel1.Visible = false;
                lblCodigo.Text = "0";
            }
            else
            {
                lblCodigo.Text = codigo.ToString();
                MenuDAO oDAO = new MenuDAO();
                App_Code.Menu obj = oDAO.carregar(Convert.ToDouble(lblCodigo.Text));
                lblCodigo.Text = obj.Codigo.ToString();
                UpdatePanel1.Visible = true;
            }
        }

        protected void Inserir(object sender, EventArgs e)
        {
            App_Code.Menu obj = new App_Code.Menu();
            obj.Codigo = 0;
            obj.Nome = txtNome.Text;
            obj.Status = (App_Code.Menu.TipoStatus)cboStatus.SelectedIndex;
            obj.Tipo = (App_Code.Menu.Tipos)cboTipo.SelectedIndex;
            MenuDAO oDAO = new MenuDAO();
            oDAO.persistir(obj);
            lblMensagem.Text = "Registro inserido com sucesso, adicione os itens do menu !";
            UpdatePanel1.Visible = true;

            List<App_Code.Menu> lista = oDAO.carregarLista(new String[] {" nome='"+ txtNome.Text +"' "},"codigo desc");
            lblCodigo.Text = lista[0].Codigo.ToString();
            codigo = lista[0].Codigo;
        }

        protected void adicionarItem(object sender, EventArgs e)
        {
            App_Code.MenuItem item = new App_Code.MenuItem();
            item.CodigoConteudo = Convert.ToDouble(cboConteudo.SelectedValue);
            item.CodigoItemPai = 0;
            item.CodigoMenu = codigo;
            item.Nome = txtNome.Text;
            MenuItemDAO oDAO = new MenuItemDAO();
            oDAO.persistir(item);
            carregaDetalhes();
        }

        private void carregaDetalhes()
        {
            MenuItemDAO oDAO = new MenuItemDAO();
            String[] filtro = new String[1];
            filtro[0] = "codigo_menu=" + Convert.ToDecimal(codigo); 
            GridView1.DataSource = oDAO.carregarLista(filtro, "codigo");
            GridView1.DataBind();
        }
    
        protected void alterar(object sender, EventArgs e)
        {
            App_Code.Menu obj = new App_Code.Menu();
            obj.Codigo = Convert.ToDouble(lblCodigo.Text);
            obj.Nome = txtNome.Text;
            obj.Status = (App_Code.Menu.TipoStatus)cboStatus.SelectedIndex;
            obj.Tipo = (App_Code.Menu.Tipos)cboTipo.SelectedIndex;
            MenuDAO oDAO = new MenuDAO();
            oDAO.persistir(obj);
            lblMensagem.Text = "Registro alterado com sucesso, adicione os itens do menu !";

        }
    }
}