using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data;
using MySql.Data.MySqlClient;
using System.IO;


namespace portal.App_Code.DAO
{   
    public class UsuarioDAO
    {
        //lendo string de conexão     
        String sc = Properties.Settings.Default.CN;
        String logPath = Properties.Settings.Default.PathErrorLog;        
        
        public Usuario carregar(long pCodigo)
        {
            Usuario obj = new Usuario();
            try{
                //cria a conexao com o bd
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from usuario where codigo=" + pCodigo;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                if(registros.Read())
                {
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);
                    obj.Email  = registros["email"].ToString();
                    obj.Nome = registros["nome"].ToString();
                    obj.Senha = registros["senha"].ToString();
                    obj.Status = (Usuario.TipoStatus)registros["status"];
                }
                conexao.Close();
            }
            catch(Exception err){               
                String log = "Erro=>" + DateTime.Now + err.Message + Environment.NewLine;
                File.AppendAllText(logPath, log);                
            }
            return obj;
        }

        public List<Usuario> carregarLista(String[] pFiltros, String pOrdena)
        {
            List<Usuario> lista = new List<Usuario>();
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();
                String sql = "select * from usuario where ";
                for (int i = 0; i < pFiltros.Length; i++)
                {
                    sql = sql + pFiltros[i];
                }
                sql = sql + " order by " + pOrdena;
                MySqlCommand comando = new MySqlCommand(sql, conexao);
                MySqlDataReader registros = comando.ExecuteReader();
                while (registros.Read())
                {
                    Usuario obj = new Usuario();
                    obj.Codigo = Convert.ToInt64(registros["codigo"]);
                    obj.Email = registros["email"].ToString();
                    obj.Nome = registros["nome"].ToString();
                    obj.Senha = registros["senha"].ToString();
                    obj.Status = (Usuario.TipoStatus)registros["status"];
                    lista.Add(obj);
                }
                conexao.Close();
            }
            catch(Exception err){
                
            }
            return lista;            
        }

        public void persistir(Usuario obj)
        {
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();

                string sql = "";
                if (obj.Codigo == 0)
                {
                    sql = "insert into usuario(nome, email, senha, status) value('{0}','{1}','{2}',{3})";
                    sql = String.Format(sql, obj.Nome, obj.Email, obj.Senha, obj.Status);
                }
                else
                {
                    sql = "update usuario set nome='{0}', email='{1}', senha='{2}', senha='{3}' where codigo={4}";
                    sql = String.Format(sql, obj.Nome, obj.Email, obj.Senha, obj.Status, obj.Codigo);
                }

                MySqlCommand comando = new MySqlCommand(sql, conexao);
                comando.ExecuteNonQuery();
                conexao.Close();
            }
            catch (Exception err)
            {

            }
        }


        public void remover(Usuario obj)
        {
            try
            {
                MySqlConnection conexao = new MySqlConnection(sc);
                conexao.Open();

                string sql = "delete from usuario where codigo="+ obj.Codigo;                
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