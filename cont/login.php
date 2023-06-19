<?php
ob_start(); //Armazena cache
session_start(); //sessão
if (isset($_SESSION['loginUser']) && (isset($_SESSION['senhaUser']))) {
  header("Location: cont/home.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/style.css">
  <link rel="shortcut icon" href="../img/img_site/favicon.png" type="image/x-icon">
  <title>Login</title>
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: row;
      padding: 20px;
      position: relative;
    }

    /*LOGIN*/
    .area-login {
      width: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }

    body form {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 20px;
    }

    body .tela-logo {
      width: 50%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    body form input,
    body form button,
    body form label {
      width: 50%;
      max-height: 50px;
      padding: 15px;
      margin: 10px 0;
      border: 1px solid #df1d1d;
      border-radius: 10px;
      background: transparent;
      color: #fff;
      outline: none;
    }

    form button,
    form label {
      text-align: center;
      font-size: 16px;
      text-transform: uppercase;
      font-weight: 700;
      cursor: pointer;
    }

    form label:hover {
      color: #fff;
      background: #df1d1d;
      border: 1px solid #fff;
      transform: scale(1.03);
    }

    .tela-logo img {
      width: 80%;
    }

    form h3 {
      text-transform: uppercase;
      font-size: 26px;
      font-weight: 700;
      width: 40%;
      border-bottom: 5px solid #df1d1d;
      color: #fff;
      text-align: center;
      padding: 5px;
      margin-bottom: 10px;
    }

    form a {
      color: #ccc;
      text-decoration: none;
    }

    form a:hover {
      color: #df1d1d;
      transform: scale(1.02);
    }

    #foto {
      display: none;
    }

    .logo-alternative {
      display: none;
      width: 60%;
      height: 150px;
      position: absolute;
      top: 0;
    }

    .logo-alternative img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .msgform {
      color: #fff;
      width: 50%;
    }

    @media (max-width: 920px) {
      .area-login {
        width: 100% !important;
      }

      form h3 {
        width: 90%;
      }

      body form input,
      body form button,
      body form label {
        width: 100%;
      }

      .tela-logo {
        display: none !important;
      }

      .logo-alternative {
        display: block;
      }
    }
  </style>
</head>

<body>
  <div class="logo-alternative">
    <img src="../img/O_Evandro.png" alt="logo">
  </div>
  <div class="area-login">
    <form action="" method="post">
      <h3>faça login</h3>
      <input type="text" name="user" id="user" placeholder="entre com nome de usuário ou email...">
      <input type="password" name="senha" id="senha" placeholder="digite a senha de acesso...">
      <button name="login" id="login" type="submit">login</button>
      <a href="registro.php">ainda não tenho cadastro</a>
    </form>
    <?php
    include('../banco/conect.php');
    //Método de acesso a ação negada
    if (isset($_GET['acao'])) {
      $acao = $_GET['acao'];
      if ($acao == 'sair') {
        echo '<div class="msgform"><strong>Você saiu da Agenda Eletrônica!</strong> Esperamos que você volte ;(</div>';
        header("Refresh: 5, ../index.php");
      }
    }
    if (isset($_POST['login'])) {
      $login = filter_input(INPUT_POST, 'user', FILTER_DEFAULT);
      $senha = base64_encode(filter_input(INPUT_POST, 'senha', FILTER_DEFAULT));

      $loginuser = "SELECT * FROM users WHERE email_user=:emailLogin AND senha=:senhaLogin";

      try {
        $result = $conect->prepare($loginuser);
        $result->bindParam(':emailLogin', $login, PDO::PARAM_STR);
        $result->bindParam(':senhaLogin', $senha, PDO::PARAM_STR);
        $result->execute();

        $verificar = $result->rowCount();
        if ($verificar > 0) {
          $login = $_POST['user'];
          $senha = $_POST['senha'];
          //CRIAR SESSÂO:
          $_SESSION['loginUser'] = $login;
          $_SESSION['senhaUser'] = $senha;

          echo '<div class="msgform"><strong>Logado com sucesso!</strong> Você será redirecionado para a agenda :)</div>';

          header("Refresh: 5, ../index.php?acao=home");
        } else {
          echo '<div class="msgform"><strong>Erro!</strong> login ou senha incorretos, digite outro login ou 
                faça o cadastro se ainda não tiver :(</div>';
          header("Refresh");
        }
      } catch (PDOException $e) {
        echo '<div class="msgform">ERRO DE LOGIN DO PDO : </div>' . $e->getMessage();
      }
    }
    ?>
  </div>
  <div class="tela-logo">
    <img src="../img/O_Evandro.png" alt="">
  </div>

</body>

</html>