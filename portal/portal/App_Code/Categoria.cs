using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace portal.App_Code
{
    public class Categoria
    {
        private int _codigo;
        private string _nomeTipo;
        private string _descritivo;

        public int Codigo
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

        public string NomeTipo
        {
            get
            {
                return _nomeTipo;
            }

            set
            {
                _nomeTipo = value;
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
    }
}