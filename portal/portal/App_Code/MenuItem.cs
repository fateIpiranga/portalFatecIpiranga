using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace portal.App_Code
{
    public class MenuItem
    {
        private double _codigo;
        private double _codigoMenu;
        private double _codigoItemPai;
        private double _codigoConteudo;
        private string _nome;
        private string _url;

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

        public double CodigoMenu
        {
            get
            {
                return _codigoMenu;
            }

            set
            {
                _codigoMenu = value;
            }
        }

        public double CodigoItemPai
        {
            get
            {
                return _codigoItemPai;
            }

            set
            {
                _codigoItemPai = value;
            }
        }

        public double CodigoConteudo
        {
            get
            {
                return _codigoConteudo;
            }

            set
            {
                _codigoConteudo = value;
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
    }
}