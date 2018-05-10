<HTML>
codigo
imagem
titulo
mensagem
url
grupo
status
	<BODY>
		<FORM METHOD = "post" ACTION = "crud.php">
			<!-- 1º PASSO CRIAR CAMPOS COM DADOS PARA A UTILIZAÇÃO NO CRUD-->
			Código: <INPUT TYPE = "text" ID = "codigo" NAME = "codigo">  <br>
			Imagem:	<INPUT TYPE = "text" ID = "imagem"   NAME = "imagem"><br>
			Titulo:	<INPUT TYPE = "text" ID = "titulo"   NAME = "titulo"><br>
			Mensagem:	<INPUT TYPE = "text" ID = "mensagem"   NAME = "mensagem"><br>
			Url:	<INPUT TYPE = "text" ID = "url"    NAME = "url">   <br>
			Grupo:	<INPUT TYPE = "text" ID = "grupo"  NAME = "grupo"> <br>
			Status: <INPUT TYPE = "text" ID = "status" NAME = "status"><br>
			
			<!-- 2º PASSO CRIAR CRIAR O MENU DE OPÇÃO DE FUNÇÃO REFERENTE AO CRUD-->
			<INPUT TYPE = "submit" NAME="btn1" VALUE="Inserir">
			<INPUT TYPE = "submit" NAME="btn2" VALUE="Pesquisar">
			<INPUT TYPE = "submit" NAME="btn3" VALUE="Alterar">
			<INPUT TYPE = "submit" NAME="btn4" VALUE="Excluir">
		</FORM>
		<!-- 3º CRIAR FUNÇÃO PHP PARA FAZER O CRUD-->
		<?php
			/* 4º PASSO INSERINDO A STRING DE CONCECXÃO COM O MYSQL */
			$con = new mysqli("baratheon0001.hospedagemdesites.ws","norto_fatecig","freiJoao59","norton_fatecig");
			
			/* 5º PASSO TESTANDO A STRING DE CONECXÃO AO BANCO> */
			if (!$con) {
				die('Não foi possível conectar: ' . mysql_error());
			}
			else{
				echo 'Conexão bem sucedida';
			}
			
			/* 6º PASSO CRINADO SELTORES DE OPÇÃO */
				/*INSERINDO DADOS NO BANCO*/
			if(isset($_POST["btn1"])){
				$codigo = $_POST["codigo"];
				$imagem	= $_POST["imagem"];
				$titulo	= $_POST["titulo"];
				$mensagem	= $_POST["mensagem"];				
				$url	= $_POST["url"];
				$grupo	= $_POST["grupo"];
				$status	= $_POST["status"];
				
				/*COMANDO MYSQL PARA INSERIR*/
				$sql = "INSET INTO slide(codigo, imagem, titulo, mensagem, url, grupo, status) values($codigo, '$imagem','$titulo','$mensagem', '$url', '$grupo', '$status')";
				/*ENVIANDO A CONECXÃO E OS DADOS PARA INSERIR NO BANCO*/
				mysqli_query($con,$sql);
				echo "SLIDE REGISTRADO COM SUCESSO! ";
			}
				/*ATUALIZANDO DADOS NO BANCO*/
			if(isset($_POST["btn3"])){
				$codigo = $_POST["codigo"];
				$imagem	= $_POST["imagem"];
				$titulo	= $_POST["titulo"];
				$mensagem	= $_POST["mensagem"];
				$url	= $_POST["url"];
				$grupo	= $_POST["grupo"];
				$status	= $_POST["status"];
				
				/*COMANDO MYSQL PARA ATULIZAR*/
				$sql = "UPDATE slide SET imagem='$imagem', titulo='$titulo', mensagem='$mensagem', url='$url', grupo='$grupo', status='$status', WHERE codigo = $codigo";
				/*ENVIANDO A CONECXÃO E OS DADOS PARA ATULIZAR NO BANCO*/
				mysqli_query($con,$sql);
				echo "SLIDE ALTERADO COM SUCESSO! ";
			}
				/*DELETANDO DADOS NO BANCO*/
			if(isset($_POST["btn4"])){
				$codigo = $_POST["codigo"];
				/*COMANDO MYSQL PARA DELETAR*/
				$sql = "DELETE FROM slide WHERE codigo = $codigo";
				/*ENVIANDO A CONECXÃO E OS DADOS PARA DELETAR 1 LINHA NO BANCO*/
				mysqli_query($con,$sql);
				echo "SLIDE REMOVIDO COM SUCESSO";	
			}
				/*CONSULTANDO DADOS NO BANCO*/
			if(isset($_POST["btn2"])){
				$codigo = $_POST["codigo"];
				/*COMANDO MYSQL PARA CONSULTAR*/
				$sql = "SELECT * FROM slide WHERE codigo = $codigo";
				/*ENVIANDO A CONECXÃO E OS DADOS PARA CONSULTA DADOS NO BANCO E ARMAZENANDO RESULTADO EM REGISTRO*/
				$registros = mysqli_query($con,$sql);
				/*VALIDANDO OS CAMPOS DE RESGISTROS E MOSTRANDO*/
				if($campos = mysqli_fetch_array($registros)){
					echo "<script lang='javascript'>";
					echo "codigo.value='".$campos["codigo"] ."';";
					echo "imagem.value='".  $campos["imagem"] ."';";
					echo "titulo.value='".$campos["titulo"] ."';";
					echo "mensagem.value='".  $campos["mensagem"] ."';";
					echo "url.value='". $campos["url"] ."';";
					echo "grupo.value='". $campos["grupo"] ."';";
					echo "status.value='".$campos["status"] ."';";					
					echo "</script>";
				} else {
					echo "SLIDE NÃO ENCONTRADO! ";	
				}
			}
			$con->close();
		?>
		</BODY>
</HTML>