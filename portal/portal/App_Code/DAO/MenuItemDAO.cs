using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using MySql.Data.MySqlClient;
using System.IO;

namespace portal.App_Code.DAO
{
    public class MenuItemDAO
    {
        //lendo string de conexão     
        String sc = Properties.Settings.Default.CN;
        String logPath = Properties.Settings.Default.PathErrorLog;

        public MenuItem carregar(long pCodigo)
        {
            MenuItem obj = new MenuItem();
            try
            {
                //cria a conexao com o bd
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from Menu_Item where codigo=" + pCodigo;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                if (registros.Read())
                {
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);
                    obj.CodigoMenu = Convert.ToInt64(registros["codigo_Menu"]);
                    obj.CodigoItemPai = Convert.ToInt64(registros["codigo_item_pai"]);
                    obj.Nome = registros["senha"].ToString();
                    obj.CodigoConteudo = Convert.ToInt64(registros["codigo_conteudo"]);
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

        public List<MenuItem> carregarLista(String[] pFiltros, String pOrdena)
        {
            List<MenuItem> lista = new List<MenuItem>();
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from Menu_Item where ";
                for (int i = 0; i < pFiltros.Length; i++)
                {
                    sql = sql + pFiltros[i];
                }
                sql = sql + " order by " + pOrdena;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                while (registros.Read())
                {
                    MenuItem obj = new MenuItem();
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);
                    obj.CodigoMenu = Convert.ToInt64(registros["codigo_Menu"]);
                    obj.CodigoItemPai = Convert.ToInt64(registros["codigo_item_pai"]);
                    obj.Nome = registros["senha"].ToString();
                    obj.CodigoConteudo = Convert.ToInt64(registros["codigo_conteudo"]);
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

        public List<MenuItem> carregarLista(int codigo)
        {
            List<MenuItem> lista = new List<MenuItem>();
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from Menu_Item where codigo = " + codigo;
                
                sql = sql + " order by " + codigo ;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                while (registros.Read())
                {
                    MenuItem obj = new MenuItem();
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);
                    obj.CodigoMenu = Convert.ToInt64(registros["codigo_Menu"]);
                    obj.CodigoItemPai = Convert.ToInt64(registros["codigo_item_pai"]);
                    obj.Nome = registros["senha"].ToString();
                    obj.CodigoConteudo = Convert.ToInt64(registros["codigo_conteudo"]);
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

        public static List<MenuItem> carregarLista(double pCodigoMenu)
        {
            String sc = Properties.Settings.Default.CN;
            String logPath = Properties.Settings.Default.PathErrorLog;
            List<MenuItem> lista = new List<MenuItem>();
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from Menu_Item where codigo_menu=" + pCodigoMenu.ToString();
                
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                while (registros.Read())
                {
                    MenuItem obj = new MenuItem();
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);
                    obj.CodigoMenu = Convert.ToInt64(registros["codigo_Menu"]);
                    obj.CodigoItemPai = Convert.ToInt64(registros["codigo_item_pai"]);
                    obj.Nome = registros["senha"].ToString();
                    obj.CodigoConteudo = Convert.ToInt64(registros["codigo_conteudo"]);
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

        public void persistir(MenuItem obj)
        {
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();

                string sql = "";
                if (obj.Codigo == 0)
                {
                    sql = "insert into Menu_Item(nome,codigo_menu, codigo_item_pai, codigo_conteudo, url) value('{0}',{1},{2},{3},'{4}')";
                    sql = String.Format(sql, obj.Nome, obj.CodigoMenu, obj.CodigoItemPai, obj.CodigoConteudo, obj.Url);
                }
                else
                {
                    sql = "update Menu_Item set nome='{0}', codigo_menu={1}, codigo_item_pai={2}, codigo_conteudo={3},url='{4}'  where codigo={5}";
                    sql = String.Format(sql, obj.Nome, obj.CodigoMenu, obj.CodigoItemPai, obj.CodigoConteudo, obj.Url, obj.Codigo);   
                }

                MySqlCommand comando = new MySqlCommand(sql, conexao);
                comando.ExecuteNonQuery();
                conexao.Close();
            }
            catch (Exception err)
            {

            }
        }


        public void remover(MenuItem obj)
        {
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();

                string sql = "delete from Menu_Item where codigo=" + obj.Codigo;
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