using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace portal.App_Code
{
    public class Menu
    {
        private double _codigo;
        private String _nome;
        private Tipos _tipo;
        private TipoStatus _status;
        private List<MenuItem> _items = new List<MenuItem>();

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

        public Tipos Tipo
        {
            get
            {
                return _tipo;
            }

            set
            {
                _tipo = value;
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

        public List<MenuItem> Items
        {
            get
            {
                return _items;
            }

            set
            {
                _items = value;
            }
        }

        public enum TipoStatus { Inativo, Ativo };
        public enum Tipos { Principal, MenuLateral, HotSite };
    }
}