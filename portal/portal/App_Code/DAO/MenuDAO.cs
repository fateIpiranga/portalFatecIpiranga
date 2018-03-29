using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using MySql.Data.MySqlClient;
using System.IO;

namespace portal.App_Code.DAO
{
    public class MenuDAO
    {
        //lendo string de conexão     
        String sc = Properties.Settings.Default.CN;
        String logPath = Properties.Settings.Default.PathErrorLog;

        public Menu carregar(double pCodigo)
        {
            Menu obj = new Menu();
            try
            {
                //cria a conexao com o bd
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from Menu where codigo=" + pCodigo;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                if (registros.Read())
                {
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);                    
                    obj.Nome = registros["nome"].ToString();
                    obj.Tipo = (Menu.Tipos)registros["tipo"];
                    obj.Status = (Menu.TipoStatus)registros["status"];
                    obj.Items = MenuItemDAO.carregarLista(obj.Codigo);
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

        public List<Menu> carregarLista(String[] pFiltros, String pOrdena)
        {
            List<Menu> lista = new List<Menu>();
            String sc = Properties.Settings.Default.CN;
            String logPath = Properties.Settings.Default.PathErrorLog;

            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from Menu where ";
                for (int i = 0; i < pFiltros.Length; i++)
                {
                    sql = sql + pFiltros[i];
                    if (i < pFiltros.Length - 1)
                    {
                        sql = sql + " and ";
                    }
                }
                sql = sql + " order by " + pOrdena;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                while (registros.Read())
                {
                    Menu obj = new Menu();
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);
                    obj.Nome = registros["nome"].ToString();
                    obj.Tipo = (Menu.Tipos)registros["tipo"];
                    obj.Status = (Menu.TipoStatus)Convert.ToUInt64(registros["status"]);
                    obj.Items = MenuItemDAO.carregarLista(obj.Codigo);
                    lista.Add(obj);
                }
                conexao.Close();
            }
            catch (Exception err)
            {

            }
            return lista;
        }


        public static List<Menu> carregarLista(double pCodigo)
        {
            List<Menu> lista = new List<Menu>();
            String sc = Properties.Settings.Default.CN;
            String logPath = Properties.Settings.Default.PathErrorLog;

            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from Menu where codigo="+ pCodigo.ToString();
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                while (registros.Read())
                {
                    Menu obj = new Menu();
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);
                    obj.Nome = registros["nome"].ToString();
                    obj.Tipo = (Menu.Tipos)registros["tipo"];
                    obj.Status = (Menu.TipoStatus)registros["status"];
                    obj.Items = MenuItemDAO.carregarLista(obj.Codigo);
                    lista.Add(obj);
                }
                conexao.Close();
            }
            catch (Exception err)
            {

            }
            return lista;
        }

        public void persistir(Menu obj)
        {
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();

                string sql = "";
                if (obj.Codigo == 0)
                {
                    sql = "insert into Menu(nome, tipo, status) value('{0}',{1},{2})";
                    sql = String.Format(sql, obj.Nome, obj.Tipo, obj.Status);
                }
                else
                {
                    sql = "update Menu set nome='{0}', tipo={1}, status={2} where codigo={3}";
                    sql = String.Format(sql, obj.Nome, obj.Tipo, obj.Status, obj.Codigo);
                }
                //gravar items
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                comando.ExecuteNonQuery();
                conexao.Close();
            }
            catch (Exception err)
            {

            }
        }


        public void remover(Menu obj)
        {
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();

                string sql = "delete from Menu where codigo=" + obj.Codigo;
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