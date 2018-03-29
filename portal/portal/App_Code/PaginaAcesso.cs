using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace portal.App_Code
{
    public class PaginaAcesso
    {
        private double _codigo;
        private string _nome;
        private string _descritivo;
        private string _pagina;
        private TipoStatus _status;

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

        public string Descritivo
        {
            get
            {
                return _descritivo;
            }

            set
            {
                _descritivo = value;
            }
        }

        public string Pagina
        {
            get
            {
                return _pagina;
            }

            set
            {
                _pagina = value;
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

        public enum TipoStatus { Ativo, Inativo };


    }
}