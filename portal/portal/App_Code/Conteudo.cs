using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace portal.App_Code
{
    public class Conteudo
    {
        private double _codigo;
        private String _nome;
        private String _titulo;
        private String _descritivo;
        private TipoStatus _status;
        private String _keywords;
        private Tipos  _tipo;
        private String _dataPublicado;
        private Menu _menuRelacionado = new Menu();
        private List<Categoria> categorias = new List<Categoria>();
        public enum Tipos{ Destaque, Conteudo, Noticia, DestaqueHotSite};
        public enum TipoStatus { Ativo, Inativo};

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

        public string Keywords
        {
            get
            {
                return _keywords;
            }

            set
            {
                _keywords = value;
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

        public string DataPublicado
        {
            get
            {
                return _dataPublicado;
            }

            set
            {
                _dataPublicado = value;
            }
        }

        public Menu MenuRelacionado
        {
            get
            {
                return _menuRelacionado;
            }

            set
            {
                _menuRelacionado = value;
            }
        }

        public List<Categoria> Categorias
        {
            get
            {
                return categorias;
            }

            set
            {
                categorias = value;
            }
        }
    }
}