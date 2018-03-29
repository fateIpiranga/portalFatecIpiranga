using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data;
using MySql.Data.MySqlClient;
using System.IO;

namespace portal.App_Code.DAO
{
    public class CategoriaDAO
    {
        //lendo string de conexão     
        String sc = Properties.Settings.Default.CN;
        String logPath = Properties.Settings.Default.PathErrorLog;

        public Categoria carregar(long pCodigo)
        {
            Categoria obj = new Categoria();
            try
            {
                //cria a conexao com o bd
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from Categoria where codigo=" + pCodigo;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                if (registros.Read())
                {
                    obj.Codigo = Convert.ToInt32(registros["codigo"]);
                    obj.NomeTipo = registros["nome_tipo"].ToString();
                    obj.Descritivo = registros["descritivo"].ToString();                    
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

        public List<Categoria> carregarLista(String[] pFiltros, String pOrdena)
        {
            List<Categoria> lista = new List<Categoria>();
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from Categoria where ";
                for (int i = 0; i < pFiltros.Length; i++)
                {
                    sql = sql + pFiltros[i];
                }
                sql = sql + " order by " + pOrdena;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                while (registros.Read())
                {
                    Categoria obj = new Categoria();
                    obj.Codigo = Convert.ToInt32(registros["codigo"]);
                    obj.NomeTipo = registros["nome_tipo"].ToString();
                    obj.Descritivo = registros["descritivo"].ToString();
                    lista.Add(obj);
                }
                conexao.Close();
            }
            catch (Exception err)
            {

            }
            return lista;
        }

        public static List<Categoria> carregarLista(Double pConteudo)
        {
            List<Categoria> lista = new List<Categoria>();
            try
            {
                String sc = Properties.Settings.Default.CN;
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select t1.* from Categoria t1,conteudo_categoria t2 where t1.codigo = t2.codigo_categoria and t2.codigo_conteudo=" + pConteudo.ToString();
                
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                while (registros.Read())
                {
                    Categoria obj = new Categoria();
                    obj.Codigo = Convert.ToInt32(registros["codigo"]);
                    obj.NomeTipo = registros["nome_tipo"].ToString();
                    obj.Descritivo = registros["descritivo"].ToString();
                    lista.Add(obj);
                }
                conexao.Close();
            }
            catch (Exception err)
            {

            }
            return lista;
        }

        public void persistir(Categoria obj)
        {
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();

                string sql = "";
                if (obj.Codigo == 0)
                {
                    sql = "insert into Categoria(nome_tipo, descritivo) value('{0}','{1}')";
                    sql = String.Format(sql, obj.NomeTipo, obj.Descritivo);
                }
                else
                {
                    sql = "update Categoria set nome='{0}', email='{1}'  where codigo={2}";
                    sql = String.Format(sql, obj.NomeTipo, obj.Descritivo);
                }

                MySqlCommand comando = new MySqlCommand(sql, conexao);
                comando.ExecuteNonQuery();
                conexao.Close();
            }
            catch (Exception err)
            {

            }
        }


        public void remover(Categoria obj)
        {
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();

                string sql = "delete from Categoria where codigo=" + obj.Codigo;
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