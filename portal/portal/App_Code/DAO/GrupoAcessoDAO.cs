                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using MySql.Data.MySqlClient;
using System.IO;

namespace portal.App_Code.DAO
{
    public class GrupoAcessoDAO
    {
        //lendo string de conexão     
        String sc = Properties.Settings.Default.CN;
        String logPath = Properties.Settings.Default.PathErrorLog;

        public GrupoAcesso carregar(long pCodigo)
        {
            GrupoAcesso obj = new GrupoAcesso();
            try
            {
                //cria a conexao com o bd
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from grupo_acesso where codigo=" + pCodigo;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                if (registros.Read())
                {
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);
                    obj.Nome = registros["nome"].ToString();
                    obj.Status = (GrupoAcesso.TipoStatus)registros["status"];
                    obj.Paginas = PaginaAcessoDAO.carregarLista(obj.Codigo);
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

        public List<GrupoAcesso> carregarLista(String[] pFiltros, String pOrdena)
        {
            List<GrupoAcesso> lista = new List<GrupoAcesso>();
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from grupo_acesso where ";
                for (int i = 0; i < pFiltros.Length; i++)
                {
                    sql = sql + pFiltros[i];
                }
                sql = sql + " order by " + pOrdena;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                while (registros.Read())
                {
                    GrupoAcesso obj = new GrupoAcesso();
          
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);
                    obj.Nome = registros["nome"].ToString();
                    obj.Status = (GrupoAcesso.TipoStatus)registros["status"];

                    obj.Paginas = PaginaAcessoDAO.carregarLista(obj.Codigo);
                    lista.Add(obj);
                }
                conexao.Close();
            }
            catch (Exception err)
            {

            }
            return lista;
        }

        public void persistir(GrupoAcesso obj)
        {
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();

                string sql = "";
                if (obj.Codigo == 0)
                {
                    sql = "insert into grupo_acesso(nome, status) value('{0}',{1})";
                    sql = String.Format(sql, obj.Nome,  obj.Status);
                }
                else
                {
                    sql = "update grupo_acesso set nome='{0}', status='{1}' where codigo={2}";
                    sql = String.Format(sql, obj.Nome, obj.Status, obj.Codigo);
                }
                //gravar lista de paginas
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                comando.ExecuteNonQuery();
                conexao.Close();
            }
            catch (Exception err)
            {

            }
        }


        public void remover(GrupoAcesso obj)
        {
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();

                string sql = "delete from grupo_acesso where codigo=" + obj.Codigo;
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