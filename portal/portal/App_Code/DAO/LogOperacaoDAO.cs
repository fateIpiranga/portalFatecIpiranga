using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using MySql.Data.MySqlClient;
using System.IO;

namespace portal.App_Code.DAO
{
    public class LogOperacaoDAO
    {
        //lendo string de conexão     
        String sc = Properties.Settings.Default.CN;
        String logPath = Properties.Settings.Default.PathErrorLog;

        public LogOperacao carregar(long pCodigo)
        {
            LogOperacao obj = new LogOperacao();
            try
            {
                //cria a conexao com o bd
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from Log_Operacao where codigo=" + pCodigo;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                if (registros.Read())
                {
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);
                    obj.Tabela = registros["tabela"].ToString();
                    obj.CodigoChave = Convert.ToInt32(registros["codigo_chave"]);
                    obj.CodigoUsuario = Convert.ToInt32(registros["codigo_usuario"]);
                    obj.TipoOperacao = (LogOperacao.TiposOperacaoes)registros["tipo_operacao"];
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

        public List<LogOperacao> carregarLista(String[] pFiltros, String pOrdena)
        {
            List<LogOperacao> lista = new List<LogOperacao>();
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from Log_Operacao where ";
                for (int i = 0; i < pFiltros.Length; i++)
                {
                    sql = sql + pFiltros[i];
                }
                sql = sql + " order by " + pOrdena;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                while (registros.Read())
                {
                    LogOperacao obj = new LogOperacao();
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);
                    obj.Tabela = registros["tabela"].ToString();
                    obj.CodigoChave = Convert.ToInt32(registros["codigo_chave"]);
                    obj.CodigoUsuario = Convert.ToInt32(registros["codigo_usuario"]);
                    obj.TipoOperacao = (LogOperacao.TiposOperacaoes)registros["tipo_operacao"];
                    //obj.Data = Convert.ToInt16(registros["status"]);

                    lista.Add(obj);
                }
                conexao.Close();
            }
            catch (Exception err)
            {

            }
            return lista;
        }

        public static void persistir(LogOperacao obj)
        {
            String sc = Properties.Settings.Default.CN;
            String logPath = Properties.Settings.Default.PathErrorLog;

            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();

                string sql = "";
               
                sql = "insert into LogOperacao(tabela, codigo_chave, codigo_usuario, data_operacao, tipo_operacao) value('{0}','{1}','{2}','sysdate',{3})";
               sql = String.Format(sql, obj.Tabela , obj.CodigoChave, obj.CodigoUsuario, obj.TipoOperacao);
               
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