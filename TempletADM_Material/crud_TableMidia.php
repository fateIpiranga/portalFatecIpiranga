<HTML>
	<BODY>
		<FORM METHOD = "post" ACTION = "crud.php">
			<!-- 1º PASSO CRIAR CAMPOS COM DADOS PARA A UTILIZAÇÃO NO CRUD-->
			Código: <INPUT TYPE = "text" ID = "codigo" NAME = "codigo"><br>
			Nome:	<INPUT TYPE = "text" ID = "nome"   NAME = "nome"><br>
			Url:	<INPUT TYPE = "text" ID = "url"    NAME = "url"><br>
			Data Publicação <INPUT TYPE = "date" ID = "dtPublicacao"    NAME = "Data_Publicacao"><br>
			
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
				$nome	= $_POST["nome"];
				$url	= $_POST["url"];
				$dtPublicacao	= $_POST["dtPublicacao"];
				/*COMANDO MYSQL PARA INSERIR*/
				$sql = "INSET INTO midia(codigo,nome, url,dtPublicacao) values($codigo, '$nome', '$url', '$dtPublicacao')";
				/*ENVIANDO A CONECXÃO E OS DADOS PARA INSERIR NO BANCO*/
				mysqli_query($con,$sql);
				echo "MIDIA REGISTRADA COM SUCESSO! ";
			}
				/*ATUALIZANDO DADOS NO BANCO*/
			if(isset($_POST["btn3"])){
				$codigo = $_POST["codigo"];
				$nome	= $_POST["nome"];
				$url	= $_POST["url"];
				$dtPublicacao	= $_POST["dtPublicacao"];
				/*COMANDO MYSQL PARA ATULIZAR*/
				$sql = "UPDATE midia set nome='$nome', url='$url',dtPublicacao='$dtPublicacao' WHERE codigo = $codigo";
				/*ENVIANDO A CONECXÃO E OS DADOS PARA ATULIZAR NO BANCO*/
				mysqli_query($con,$sql);
				echo "MIDIA ALTERADA COM SUCESSO! ";
			}
				/*DELETANDO DADOS NO BANCO*/
			if(isset($_POST["btn4"])){
				$codigo = $_POST["codigo"];
				/*COMANDO MYSQL PARA DELETAR*/
				$sql = "DELETE FROM midia WHERE codigo = $codigo";
				/*ENVIANDO A CONECXÃO E OS DADOS PARA DELETAR 1 LINHA NO BANCO*/
				mysqli_query($con,$sql);
				echo "MIDIA REMOVIDA COM SUCESSO";	
			}
				/*CONSULTANDO DADOS NO BANCO*/
			if(isset($_POST["btn2"])){
				$codigo = $_POST["codigo"];
				/*COMANDO MYSQL PARA CONSULTAR*/
				$sql = "SELECT * FROM midia WHERE codigo = $codigo";
				/*ENVIANDO A CONECXÃO E OS DADOS PARA CONSULTA DADOS NO BANCO E ARMAZENANDO RESULTADO EM REGISTRO*/
				$registros = mysqli_query($con,$sql);
				/*VALIDANDO OS CAMPOS DE RESGISTROS E MOSTRANDO*/
				if($campos = mysqli_fetch_array($registros)){
					echo "<script lang='javascript'>";
					echo "codigo.value='".$campos["codigo"] ."';";
					echo "nome.value='".  $campos["nome"] ."';";
					echo "url.value='". $campos["url"] ."';";
					echo "dtPublicacao.value='". $campos["dtPublicacao"] ."';";
					echo "</script>";
				} else {
					echo "MIDIA NÃO ENCONTRADA! ";	
				}
			}
			$con->close();
		?>
		</BODY>
</HTML>