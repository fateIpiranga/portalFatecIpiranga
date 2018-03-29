using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace portal.App_Code
{
    public class GrupoAcesso
    {
        private double _codigo;
        private string _nome;
        private TipoStatus _status;
        private List<PaginaAcesso> paginas = new List<PaginaAcesso>();
        public double Codigo
        {
            get
            {
                return _codigo;
            }

            set
            {
                _codigo = value;
            }
        }

        public string Nome
        {
            get
            {
                return _nome;
            }

            set
            {
                _nome = value;
            }
        }

        public TipoStatus Status
        {
            get
            {
                return _status;
            }

            set
            {
                _status = value;
            }
        }

        public List<PaginaAcesso> Paginas
        {
            get
            {
                return paginas;
            }

            set
            {
                paginas = value;
            }
        }

        public enum TipoStatus  {Ativo, Inativo};

    }
}