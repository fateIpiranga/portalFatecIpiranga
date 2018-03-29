using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using MySql.Data.MySqlClient;
using System.IO;


namespace portal.App_Code.DAO
{
    public class PaginaAcessoDAO
    {
        //lendo string de conexão     
        String sc = Properties.Settings.Default.CN;
        String logPath = Properties.Settings.Default.PathErrorLog;

        public PaginaAcesso carregar(long pCodigo)
        {
            PaginaAcesso obj = new PaginaAcesso();
            try
            {
                //cria a conexao com o bd
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from Pagina_Acesso where codigo=" + pCodigo;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                if (registros.Read())
                {
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);
                    obj.Nome = registros["nome"].ToString();
                    obj.Descritivo = registros["descritivo"].ToString();
                    obj.Pagina = registros["pagina"].ToString();
                    obj.Status = (PaginaAcesso.TipoStatus)registros["status"];
                }
                conexao.Close();
            }
            catch (Exception err)
            {
                String log = "Erro=>" + DateTime.Now + err.Message + Environment.NewLine;
                File.AppendAllText(logPath, log);
            }
            return obj;
        }

        public List<PaginaAcesso> carregarLista(String[] pFiltros, String pOrdena)
        {
            List<PaginaAcesso> lista = new List<PaginaAcesso>();
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from Pagina_Acesso where ";
                for (int i = 0; i < pFiltros.Length; i++)
                {
                    sql = sql + pFiltros[i];
                }
                sql = sql + " order by " + pOrdena;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                while (registros.Read())
                {
                    PaginaAcesso obj = new PaginaAcesso();
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);
                    obj.Nome = registros["nome"].ToString();
                    obj.Descritivo = registros["descritivo"].ToString();
                    obj.Pagina = registros["pagina"].ToString();
                    obj.Status = (PaginaAcesso.TipoStatus)registros["status"];
                    lista.Add(obj);
                }
                conexao.Close();
            }
            catch (Exception err)
            {

            }
            return lista;
        }


        public static List<PaginaAcesso> carregarLista(double pCodigo)
        {
            String sc = Properties.Settings.Default.CN;
            String logPath = Properties.Settings.Default.PathErrorLog;

            List<PaginaAcesso> lista = new List<PaginaAcesso>();
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                String sql = "select t1.* from Pagina_Acesso t1,permissao_acesso t2 where t1.codigo_pagina=t2.codigo_grupo and t2.codigo_grupo="+ pCodigo;

                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                while (registros.Read())
                {
                    PaginaAcesso obj = new PaginaAcesso();
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);
                    obj.Nome = registros["nome"].ToString();
                    obj.Descritivo = registros["descritivo"].ToString();
                    obj.Pagina = registros["pagina"].ToString();
                    obj.Status = (PaginaAcesso.TipoStatus)registros["status"];
                    lista.Add(obj);
                }
                conexao.Close();
            }
            catch (Exception err)
            {

            }
            return lista;
        }

        public void persistir(PaginaAcesso obj)
        {
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();

                string sql = "";
                if (obj.Codigo == 0)
                {
                    sql = "insert into Pagina_Acesso(nome, descritivo, pagina, status) value('{0}','{1}','{2}',{3})";
                    sql = String.Format(sql, obj.Nome, obj.Descritivo, obj.Pagina, obj.Status);
                }
                else
                {
                    sql = "update Pagina_Acesso set nome='{0}', descritivo='{1}', pagina='{2}', status={3} where codigo={4}";
                    sql = String.Format(sql, obj.Nome, obj.Descritivo, obj.Pagina, obj.Status, obj.Codigo);
                }

                MySqlCommand comando = new MySqlCommand(sql, conexao);
                comando.ExecuteNonQuery();
                conexao.Close();
            }
            catch (Exception err)
            {

            }
        }


        public void remover(PaginaAcesso obj)
        {
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();

                string sql = "delete from Pagina_Acesso where codigo=" + obj.Codigo;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                comando.ExecuteNonQuery();
                conexao.Close();
            }
            catch (Exception err)
            {

            }
        }

    }
}