using portal.App_Code;
using portal.App_Code.DAO;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;

namespace portal.Controller
{
    public class ConteudoController : ApiController
    {


        // GET: api/Conteudo
        public List<App_Code.Conteudo> Get([FromUri]String tipo, [FromUri]String status)
        {
            String filtro1 = "tipo = " + tipo;
            String filtro2 = "status = " + status;
            String[] filtros = {filtro1, filtro2};
           
            return new ConteudoDAO().carregarLista(filtros, "data_publicado DESC"); ;
        }

        // GET: api/Conteudo/5
        public App_Code.Conteudo Get(int id)
        {
            ConteudoDAO oDAO = new ConteudoDAO();
            return oDAO.carregar(id);
        }

        // POST: api/Conteudo
        public void Post([FromBody]string value)
        {
        }

        // PUT: api/Conteudo/5
        public void Put(int id, [FromBody]string value)
        {
        }

        // DELETE: api/Conteudo/5
        public void Delete(int id)
        {
        }
    }
}
