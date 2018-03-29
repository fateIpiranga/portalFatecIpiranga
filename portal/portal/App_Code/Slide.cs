using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace portal.App_Code
{
    public class Slide
    {
        private double _codigo;
        private string _imagem;
        private string _grupo;
        private string _titulo;
        private string _mensagem;
        private string _url;
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

        public string Imagem
        {
            get
            {
                return _imagem;
            }

            set
            {
                _imagem = value;
            }
        }

        public string Grupo
        {
            get
            {
                return _grupo;
            }

            set
            {
                _grupo = value;
            }
        }

        public string Titulo
        {
            get
            {
                return _titulo;
            }

            set
            {
                _titulo = value;
            }
        }

        public string Mensagem
        {
            get
            {
                return _mensagem;
            }

            set
            {
                _mensagem = value;
            }
        }

        public string Url
        {
            get
            {
                return _url;
            }

            set
            {
                _url = value;
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