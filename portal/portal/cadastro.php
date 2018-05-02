<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Cadastro - Portal Fatec Ipiranga</title>
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
      <div class="card-header">Cadastrar uma conta</div>
      <div class="card-body">
        <div id="mensagem"> </div>
        <form id="cadastro" name="cadastro">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="inputName">Primeiro nome</label>
                <input class="form-control" id="inputName" name="inputName" type="text" aria-describedby="nameHelp" placeholder="Informe seu nome" required>
              </div>
              <div class="col-md-6">
                <label for="inputLastName">Sobrenome</label>
                <input class="form-control" id="inputLastName" name="inputLastName" type="text" aria-describedby="nameHelp" placeholder="Informe seu sobrenome" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1">Endereço de e-mail</label>
            <input class="form-control" id="inputEmail1" name="inputEmail1" type="email" aria-describedby="emailHelp" placeholder="Informe seu e-mail" required>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="inputPassword1">Senha</label>
                <input class="form-control" id="inputPassword1" name="inputPassword1" type="password" placeholder="Senha" required>
              </div>
              <div class="col-md-6">
                <label for="confirmPassword">Confirme a senha</label>
                <input class="form-control" id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirme a senha" required>
              </div>
            </div>
          </div>
          <input class="btn btn-primary btn-block" id="btnCadastrar" type="submit" value="Cadastrar" disabled="true">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Página de Login</a>
          <a class="d-block small" href="esqueci-senha.php">Esqueci minha senha</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script>
      $('#cadastro').submit(function(e){
          e.preventDefault();
          var formulario = $(this);
          var restorno = inserirFormulario(formulario);
      });
      
      function inserirFormulario(dados){
          $.ajax({
              type:"POST",
              data: dados.serialize(),
              url:"inserir_cadastro.php",
              async:false
              
          }).then(sucesso, falha);
          
          function sucesso(data){
              $sucesso = $.parseJSON(data)["sucesso"];
              $mensagem = $.parseJSON(data)["mensagem"];
              $('#mensagem').show();
              
              if($sucesso){
                  alert($mensagem);
                  $("#inputName").val("");
                  $("#inputLastName").val("");
                  $("#inputEmail1").val("");
                  $("#inputPassword1").val("");
                  $("#confirmPassword").val("");
                  window.location='login.php';
              }else{
                  $('#mensagem').html($mensagem);
              }
          }
          
          function falha(){
              console.log("Erro");
          }
      }
      
    $("#confirmPassword").on("change keyup", function() {
        verificaConfirmacaoSenha();
    });
      
    $("#confirmPassword").on("change keyup", function() {
        verificaConfirmacaoSenha();
    });
      
    function verificaConfirmacaoSenha(){
        var senha = $("#inputPassword1").val();
        var confirma = $("#confirmPassword").val();
        var mensagem = "Senha e confirmação da senha devem ser iguais.";
        $('#mensagem').show();
        
        if (senha != confirma) {
            $( "#btnCadastrar" ).prop( "disabled", true );
            $('#mensagem').html(mensagem);
        } else {
            $('#mensagem').hide();
            $( "#btnCadastrar" ).prop( "disabled", false );
        }
    }
  </script>
</body>

</html>