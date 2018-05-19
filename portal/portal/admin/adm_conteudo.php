<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Registro de Conteúdo</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registro de Conteúdo</div>
      <div class="card-body">
       <form method="post" action="teste_adm_conteudo.php" >
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="codigo">Código</label>
                <input class="form-control" name="codigo" type="number" aria-describedby="codigoHelp" placeholder="Código da postagem">
              </div>
              <div class="col-md-6">
                <label for="tipo">Tipo</label>
				<select class="form-control"  name="tipo" type="text" aria-describedby="tipoHelp">
					<option value="0"> Destaque </option>
					<option value="1"> Conteudo </option>
					<option value="2"> Noticia </option>
					<option value="3"> DestaqueHotSite </option>
				</select>	
			 </div>
			  <div class="col-md-6">
                <label for="keyWord">Palavras Chave</label>
                <input class="form-control" name="keywords" type="text" aria-describedby="keyWordHelp" placeholder="Entre com palavras chave para pesquisa">
              </div>
			  <div class="col-md-6">
                <label for="menuRelacionado">Menu Relacionado</label>
                <select class="form-control" name="menuRelacionado" aria-describedby="menuRelacionado">
					<option value="0"> Nenhum menu relacionado</option>
					<?php
							while ($registro = @mysql_fetch_array($result)) {

								$codigo = $registro ["codigo"];
								$nome = $registro ["nome"];
								echo"<option value='$codigo'> $nome </option>";

		}					
					?>
				</select>
              </div>
			 
            </div>
          </div>
			<div class="form-group">
				<label for="nome">Nome</label>
				<input class="form-control" name="nome" type="text" aria-describedby="nomeHelp" placeholder="Entre com o nome">
			</div>
			<div class="form-group">	
				<label for="titulo">Titulo</label>
				<input class="form-control" name="titulo" type="text" aria-describedby="tituloHelp" placeholder="Entre com o titulo">
			</div>
			 <div class="form-group">
			<!-- colocar radio button ativo ou inativo -->
				<label for="status"> Status </label>
				<input class="form-control" name="status" type="radio" aria-describedby="statusHelp" value="1" /> Sim 
				<input class="form-control" name="status" type="radio" aria-describedby="statusHelp" value="0" /> Não
				
			</div>
			
			<div class="form-group">
				<label for="conteudo">Conteudo da publicação</label></br>
				<textarea class="form-control" id="conteudo" name="conteudo" placeholder="Entre com o conteudo da publicação" rows="6" cols="50"></textarea>
			
			</div>
			
			<input type="submit" name="btn1" value="Inserir">
			<input type="submit" name="btn2" value="Pesquisar">
			<input type="submit" name="btn3" value="Alterar">
			<input type="submit" name="btn4" value="Excluir">
          </form>
			
      </div>
    </div>
  </div>
 
  <?php
		$con = new mysqli("baratheon0001.hospedagemdesites.ws","norto_fatecig","freiJoao59","norton_fatecig");
		if(isset($_POST["btn1"]))
		{
		inserir();
		}
		if(isset($_POST["btn3"]))
		{
		alterar();
		}
		
		if(isset($_POST["btn4"]))
		{
		remover();
		}
		
		if(isset($_POST["btn2"]))
		{
		busca();
		}
		//$con->close();

		
  ?>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>

<?php
	
	
	function carregaMenu(){
		
		$con = new mysqli("baratheon0001.hospedagemdesites.ws","norto_fatecig","freiJoao59","norton_fatecig");
		$sql = "select codigo, nome from menu where status=1";
        $result = mysql_query($sql) or die ("Ops, deu Erro!!!");
		$con->close();
		

   }
	
	function busca()
	{
			$con = new mysqli("baratheon0001.hospedagemdesites.ws","norto_fatecig","freiJoao59","norton_fatecig");
			$codigo = $_POST["codigo"];
			$sql = "select * from conteudo where codigo=$codigo";
			$registros = mysqli_query($con,$sql);
			if($campos = mysqli_fetch_array($registros)){
				echo "<script lang='javascript'>";
				echo "nome.value='".  $campos["nome"] ."';";
				echo "titulo.value='". $campos["titulo"] ."';";
				echo "conteudo.value='". $campos["conteudo"] ."';";
				echo "status.value='". $campos["status"] ."';";
				echo "keywords.value='". $campos["keywords"] ."';";
				echo "tipo.value='". $campos["tipo"] ."';";
				echo "data_publicado.value='". $campos["data_publicado"] ."';";
				echo "</script>";
			} else {
				echo "registro não encontrado!";	
			}
			$con->close();
	}
	function remover()
	{
			$con = new mysqli("baratheon0001.hospedagemdesites.ws","norto_fatecig","freiJoao59","norton_fatecig");
			$codigo = $_POST["codigo"];
			$sql = "delete from conteudo where codigo=$codigo";
			mysqli_query($con,$sql);
			echo "registro removido	com sucesso";
			$con->close();	
	}
	function inserir()
	{ 
			$con = new mysqli("baratheon0001.hospedagemdesites.ws","norto_fatecig","freiJoao59","norton_fatecig");
			$tipo	= $_POST["tipo"];
			$nome	= $_POST["nome"];
			$titulo	= $_POST["titulo"];
			$conteudo = $_POST["conteudo"];	
			$status = $_POST["status"];
			$keywords = $_POST["keywords"];
			$tipo = $_POST["tipo"];	
			$sql = "insert into conteudo(nome, titulo, conteudo, status, keywords, tipo, data_publicado) 
			values('$nome', '$titulo', '$conteudo', '$status', '$keywords', '$tipo', NOW())";
			mysqli_query($con,$sql);
			echo "registro inserido com sucesso !";
			$con->close();
	}
	function alterar(){
			$con = new mysqli("baratheon0001.hospedagemdesites.ws","norto_fatecig","freiJoao59","norton_fatecig");
			$codigo = $_POST["codigo"];
			$nome	= $_POST["nome"];
			$titulo	= $_POST["titulo"];
			$conteudo = $_POST["conteudo"];	
			$status = $_POST["status"];
			$keywords = $_POST["keywords"];
			$tipo = $_POST["tipo"];
			$sql = "update conteudo set nome='$nome', titulo='$titulo',conteudo='$conteudo',status='$status',
			keywords='$keywords',tipo='$tipo' where codigo=$codigo";
			mysqli_query($con,$sql);
			echo "registro alterado com sucesso !";
			$con->close();
		}

?>
