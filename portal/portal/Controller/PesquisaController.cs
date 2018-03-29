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
    public class PesquisaController : ApiController
    {
        // GET: api/Pesquisa
        public List<Conteudo> Get([FromUri]string value)
        {
            String filtro1 = "keywords = " + value ;
            String[] filtros = { filtro1};

            return new ConteudoDAO().carregarLista(filtros, "titulo");
        }

        // GET: api/Pesquisa/5
        public string Get(int id)
        {
            return "value";
        }

        // POST: api/Pesquisa
        public void Post([FromBody]string value)
        {
        }

        // PUT: api/Pesquisa/5
        public void Put(int id, [FromBody]string value)
        {
        }

        // DELETE: api/Pesquisa/5
        public void Delete(int id)
        {
        }
    }
}
