<?php
    require_once("connection.php");
    $email = '';
    $pass = '';
    
    if(isset($_POST["email"])){
        $email = $_POST["email"];
        $pass = $_POST["password"];

        $login = "SELECT * FROM usuario ";
        $login .= "WHERE email = '{$email}' AND senha = '{$pass}' ";
        
        $access = mysqli_query($connect, $login);
        if(!$access){
            die("Falha na consulta ao banco");
        }
        
        $result_query = mysqli_fetch_assoc ($access);
        if(empty($result_query)){
            $msg = "Usuário ou senha incorretos.";
        }else{
            header("location:index.html");
        }   
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
    <title>Login - Portal Fatec Ipiranga</title>
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
            <div class="card-header">Login</div>
            <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Endereço de e-mail</label>
                    <input class="form-control" id="exampleInputEmail1" name="email" type="email" aria-describedby="emailHelp" placeholder="Informe seu e-mail"  
                           value="<?php echo $email; ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Informe sua senha" 
                           value="<?php echo $pass; ?>" required>
                </div>
                <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> Lembrar minha senha</label>
                </div>
                </div>
                
                <!--<a class="btn btn-primary btn-block" href="index.html">Login</a>-->
                <input class="btn btn-primary btn-block" type="submit" value="Login">
                <?php if (isset($msg)){ ?>
                <label id="msgErro"><?php echo $msg ?></label>
                <?php } ?>
            </form>
            <div class="text-center">
              <a class="d-block small mt-3" href="register.html">Cadastrar</a>
              <a class="d-block small" href="forgot-password.html">Esqueci minha senha</a>
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


<?php
    mysqli_close($connect);
?>

