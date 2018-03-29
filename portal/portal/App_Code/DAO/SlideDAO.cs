using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using MySql.Data.MySqlClient;
using System.IO;


namespace portal.App_Code.DAO
{
    public class SlideDAO
    {
        //lendo string de conexão     
        String sc = Properties.Settings.Default.CN;
        String logPath = Properties.Settings.Default.PathErrorLog;

        public Slide carregar(long pCodigo)
        {
            Slide obj = new Slide();
            try
            {
                //cria a conexao com o bd
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from Slide where codigo=" + pCodigo;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                if (registros.Read())
                {
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);
                    obj.Imagem = registros["imagem"].ToString();
                    obj.Titulo = registros["titulo"].ToString();
                    obj.Mensagem = registros["mensagem"].ToString();
                    obj.Url = registros["url"].ToString();
              
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

        public List<Slide> carregarLista(String[] pFiltros, String pOrdena)
        {
            List<Slide> lista = new List<Slide>();
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from Slide where ";
                for (int i = 0; i < pFiltros.Length; i++)
                {
                    sql = sql + pFiltros[i];
                    if (i != pFiltros.Length - 1)
                        sql = sql + " and ";
                    
                }
                sql = sql + " order by " + pOrdena;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                while (registros.Read())
                {
                    Slide obj = new Slide();
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);
                    obj.Imagem = registros["imagem"].ToString();
                    obj.Titulo = registros["titulo"].ToString();
                    obj.Mensagem = registros["mensagem"].ToString();
                    obj.Url = registros["url"].ToString();
                    lista.Add(obj);
                }
                conexao.Close();
            }
            catch (Exception err)
            {

            }
            return lista;
        }

        public void persistir(Slide obj)
        {
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();

                string sql = "";
                if (obj.Codigo == 0)
                {
                    sql = "insert into Slide(imagem, titulo, mensagem, url) value('{0}','{1}','{2}','{3}')";
                    sql = String.Format(sql, obj.Imagem, obj.Titulo, obj.Mensagem, obj.Url);
                }
                else
                {
                    sql = "update Slide set imagem='{0}', titulo='{1}', mensagem='{2}', url='{3}' where codigo={4}";
                    sql = String.Format(sql, obj.Imagem, obj.Titulo, obj.Mensagem, obj.Url, obj.Codigo);
                }

                MySqlCommand comando = new MySqlCommand(sql, conexao);
                comando.ExecuteNonQuery();
                conexao.Close();
            }
            catch (Exception err)
            {

            }
        }


        public void remover(Slide obj)
        {
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();

                string sql = "delete from Slide where codigo=" + obj.Codigo;
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