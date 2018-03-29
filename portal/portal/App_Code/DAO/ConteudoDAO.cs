using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data;
using MySql.Data.MySqlClient;
using System.IO;
using MySql.Data.MySqlClient;
using System.IO;


namespace portal.App_Code.DAO
{
    public class ConteudoDAO
    {
        //lendo string de conexão     
        String sc = Properties.Settings.Default.CN;
        String logPath = Properties.Settings.Default.PathErrorLog;

        public Conteudo carregar(long pCodigo)
        {
            Conteudo obj = new Conteudo();
            MenuDAO menuDAO = new MenuDAO();
            try
            {
                //cria a conexao com o bd
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from Conteudo where codigo=" + pCodigo;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                if (registros.Read())
                {
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);              
                    obj.DataPublicado = registros.GetDateTime("data_publicado").ToString("dd/MM/yyyy");
                    obj.Descritivo = registros["conteudo"].ToString();
                    obj.Keywords = registros["keywords"].ToString();
                    obj.Nome = registros["nome"].ToString();
                    obj.Status = (Conteudo.TipoStatus)Convert.ToUInt64(registros["status"]);
                    obj.Tipo = (Conteudo.Tipos)Convert.ToUInt64(registros["tipo"]);
                    obj.Titulo = registros["titulo"].ToString();
                    obj.Categorias = CategoriaDAO.carregarLista(obj.Codigo);

                    obj.MenuRelacionado = menuDAO.carregar(Convert.ToDouble(registros["codigo_menu"]));                            
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

        public List<Conteudo> carregarLista(String[] pFiltros, String pOrdena)
        {
            List<Conteudo> lista = new List<Conteudo>();
            try
            {
                MenuDAO menuDAO = new MenuDAO();
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from Conteudo where ";
                for (int i = 0; i < pFiltros.Length; i++)
                {
                    sql = sql + pFiltros[i];
                    if (i != pFiltros.Length - 1)
                    {
                        sql = sql + " and ";
                    }
                }
                sql = sql + " order by " + pOrdena;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                while (registros.Read())
                {
                    Conteudo obj = new Conteudo();
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);
                    obj.DataPublicado = registros.GetDateTime("data_publicado").ToString("dd/MM/yyyy");
                    obj.Descritivo = registros["conteudo"].ToString();
                    obj.Keywords = registros["keywords"].ToString();
                    obj.Nome = registros["nome"].ToString();
                    obj.Status = (Conteudo.TipoStatus)Convert.ToUInt64(registros["status"]);
                    obj.Tipo = (Conteudo.Tipos)Convert.ToInt64(registros["tipo"]);
                    obj.Titulo = registros["titulo"].ToString();
                    obj.Categorias = CategoriaDAO.carregarLista(obj.Codigo);
                    obj.MenuRelacionado = menuDAO.carregar(Convert.ToDouble(registros["codigo_menu"]));
                    lista.Add(obj);
                }
                conexao.Close();
            }
            catch (Exception err)
            {

            }
            return lista;
        }

        public void persistir(Conteudo obj)
        {
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();

                string sql = "";
                if (obj.Codigo == 0)
                {
                    sql = "insert into Conteudo(nome, titulo, conteudo, status, keywords, tipo, data_publicado, codigo_menu) " +
                         " value('{0}','{1}','{2}','{3}','{4}','{5}','{6}',{7})";
                    sql = String.Format(sql, obj.Nome, obj.Titulo, obj.Descritivo, obj.Status, obj.Keywords, obj.Tipo,"sysdate", obj.MenuRelacionado.Codigo);
                    //grava cateforia    
                }
                else
                {
                    sql = "update Conteudo set nome='{0}', titulo='{1}', conteudo='{2}', keywords='{3}', codigo_menu={4} where codigo={5}";
                    sql = String.Format(sql, obj.Nome, obj.Titulo, obj.Descritivo, obj.Status, obj.Keywords, obj.Tipo, obj.MenuRelacionado.Codigo);
                }

                MySqlCommand comando = new MySqlCommand(sql, conexao);
                comando.ExecuteNonQuery();
                conexao.Close();
            }
            catch (Exception err)
            {

            }
        }


        public void remover(Conteudo obj)
        {
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();

                string sql = "delete from Conteudo where codigo=" + obj.Codigo;
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