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
    public partial class categoria : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void Salvar(object sender, EventArgs e)
        {
            Categoria cat = new Categoria();
            cat.Codigo = Convert.ToInt32(txtCodigo);
            cat.NomeTipo = txtTipo.Text;
            cat.Descritivo = txtDescritivo.Text;

            CategoriaDAO dao = new CategoriaDAO();
            dao.persistir(cat);
        }

        protected void Pesquisar(object sender, EventArgs e)
        {
            Categoria cat = new Categoria();
            cat.Codigo = Convert.ToInt32(txtCodigo);

            CategoriaDAO dao = new CategoriaDAO();
            dao.carregar(cat.Codigo);
        }

        protected void Excluir(object sender, EventArgs e)
        {
            Categoria cat = new Categoria();
            CategoriaDAO dao = new CategoriaDAO();
            dao.remover(cat);
        }
    }
}