<?php
    if(isset($_POST["inputEmail1"])){
        $email = $_POST["inputEmail1"];
        $mensagem 		= "Teste envio de e-mail.";

        require_once("phpmailer/class.phpmailer.php");

        define('GUSER', 'teste@gmail.com');	 // <-- Insira aqui o seu GMail
        define('GPWD', '123456');		     // <-- Insira aqui a senha do seu GMail

        function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
            global $error;
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587; 
            $mail->Username = GUSER;
            $mail->Password = GPWD;
            $mail->SetFrom($de, $de_nome);
            $mail->Subject = $assunto;
            $mail->Body = $corpo;
            $mail->AddAddress($para);
            if(!$mail->Send()) {
                $error = 'Mail error: '.$mail->ErrorInfo; 
                return false;
            } else {
                $error = 'Mensagem enviada!';
                return true;
            }
        }

        if (smtpmailer($email, 'cesar.matsubayashi@gmail.com', 'Portal Fatec Ipiranga', 'Teste Email', $mensagem)) {

            Header("location:login.php"); // Redireciona para uma página de login.

        }
        if (!empty($error)) echo $error;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Esqueci minha senha - Portal Fatec Ipiranga</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Redefinir Senha</div>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h4>Esqueceu sua senha?</h4>
          <p>Informe seu endereço de e-mail e nós te enviaremos instruções de como redefinir sua senha.</p>
        </div>
        <form action="esqueci-senha.php" method="POST">
          <div class="form-group">
            <input class="form-control" id="inputEmail1" name="inputEmail1" type="email" aria-describedby="emailHelp" placeholder="Informe seu endereço de e-mail">
          </div>
          <input type="submit" class="btn btn-primary btn-block" id="enviar" value="Enviar e-mail">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="cadastro.php">Cadastrar uma conta</a>
          <a class="d-block small" href="login.php">Página de login</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
