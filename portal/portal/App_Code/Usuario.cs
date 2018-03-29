using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace portal.App_Code
{
    public class Usuario
    {
        private long codigo;

        public long Codigo
        {
            get { return codigo; }
            set { codigo = value; }
        }
        private string nome;

        public string Nome
        {
            get { return nome; }
            set { nome = value; }
        }
        private string email;

        public string Email
        {
            get { return email; }
            set { email = value; }
        }
        private string senha;

        public string Senha
        {
            get { return senha; }
            set { senha = value; }
        }
        private TipoStatus status;

        public TipoStatus Status
        {
            get { return status; }
            set { status = value; }
        }

        public GrupoAcesso GrupoAcesso
        {
            get
            {
                return _grupoAcesso;
            }

            set
            {
                _grupoAcesso = value;
            }
        }

        public enum TipoStatus { Ativo, Inativo };

        private GrupoAcesso _grupoAcesso = new GrupoAcesso();

    }
}