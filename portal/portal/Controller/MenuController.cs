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
    public class MenuController : ApiController
    {
        // GET api/Menu
        public List<Menu> Get([FromUri]String tipo, [FromUri]String status)
        {
            string[] filtros = { "tipo = " + tipo, "status = " + status };
            return new MenuDAO().carregarLista(filtros,"codigo");
        }

        // GET api/<controller>/5
        public Menu Get(int id)
        {
            return null;
        }

        // POST api/<controller>
        public void Post([FromBody]string value)
        {
        }

        // PUT api/<controller>/5
        public void Put(int id, [FromBody]string value)
        {
        }

        // DELETE api/<controller>/5
        public void Delete(int id)
        {
        }
    }
}