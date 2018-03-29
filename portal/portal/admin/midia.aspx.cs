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
    public partial class midia : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void Salvar(object sender, EventArgs e)
        {
            Midia mid = new Midia();
            mid.Codigo = Convert.ToInt64(txtCodigo);
            mid.Nome = txtNome.Text;
            mid.Url = txtUrl.Text;
            mid.Data = txtData.Text;

            MidiaDAO dao = new MidiaDAO();
            dao.persistir(mid);
        }


        protected void Pesquisar(object sender, EventArgs e)
        {
            Midia mid = new Midia();
            mid.Codigo = Convert.ToInt64(txtCodigo);

            MidiaDAO dao = new MidiaDAO();
            dao.carregar(Convert.ToInt32(mid.Codigo));
        }

        protected void Excluir(object sender, EventArgs e)
        {
            Midia mid = new Midia();
            MidiaDAO dao = new MidiaDAO();
            dao.remover(mid);
        }
    }
}