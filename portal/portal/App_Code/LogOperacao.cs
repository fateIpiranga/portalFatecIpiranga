using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace portal.App_Code
{
    public class LogOperacao
    {
        private double _codigo;
        private string _tabela;
        private double _codigoChave;
        private double _codigoUsuario;
        private string _data;
        private TiposOperacaoes _tipoOperacao;

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

        public string Tabela
        {
            get
            {
                return _tabela;
            }

            set
            {
                _tabela = value;
            }
        }

        public double CodigoChave
        {
            get
            {
                return _codigoChave;
            }

            set
            {
                _codigoChave = value;
            }
        }

        public double CodigoUsuario
        {
            get
            {
                return _codigoUsuario;
            }

            set
            {
                _codigoUsuario = value;
            }
        }

        public string Data
        {
            get
            {
                return _data;
            }

            set
            {
                _data = value;
            }
        }

        public TiposOperacaoes TipoOperacao
        {
            get
            {
                return _tipoOperacao;
            }

            set
            {
                _tipoOperacao = value;
            }
        }

        public enum TiposOperacaoes {Inserir, Alterar, Excluir};

    }
}