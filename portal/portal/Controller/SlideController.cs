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
    public class SlideController : ApiController
    {
        // GET: api/Slide
        public List<Slide> Get([FromUri]String status, [FromUri]String grupo)
        {
            string filtroUm = "status =" + status;
            string filtroDois = "grupo = \"" + grupo + "\"";
            String[] filtros = {filtroUm, filtroDois};
            return new SlideDAO().carregarLista(filtros, "codigo");
        }

        // GET: api/Slide/5
        public string Get(int id)
        {
            return "value";
        }

        // POST: api/Slide
        public void Post([FromBody]string value)
        {
        }

        // PUT: api/Slide/5
        public void Put(int id, [FromBody]string value)
        {
        }

        // DELETE: api/Slide/5
        public void Delete(int id)
        {
        }
    }
}
