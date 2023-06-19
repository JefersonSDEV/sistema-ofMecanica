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
    <form action="" method="post" enctype="multipart/form-data">
      <h3>Cadastre-se agora</h3>
      <input type="text" name="user" id="user" placeholder="digite seu nome completo...">
      <input type="text" name="email" id="email" placeholder="digite seu email...">
      <label for="foto">upload der imagem</label>
      <input type="file" name="foto" id="foto">
      <input type="password" name="senha" id="senha" placeholder="digite a senha de acesso...">
      <button name="login" id="login" type="submit">Registro</button>
      <a href="login.php">fazer login</a>
    </form>
    <?php
    include('../banco/conect.php');
    if (isset($_POST['login'])) {
      $nome = $_POST['user'];
      $email = $_POST['email'];
      $senha = base64_encode($_POST['senha']);

      $formatP = array("png", "jpg", "jpeg", "JPG", "gif");
      $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

      if (in_array($extensao, $formatP)) {
        $pasta = "../img/users/";
        $temporario = $_FILES['foto']['tmp_name'];
        $novoNome = uniqid() . ".$extensao";

        if (move_uploaded_file($temporario, $pasta . $novoNome)) {
          $cadastro = "INSERT INTO users (img_user,nome_user,email_user,senha) VALUES (:foto,:nome,:email,:senha)";

          try {
            $result = $conect->prepare($cadastro);
            $result->bindParam(':nome', $nome, PDO::PARAM_STR);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->bindParam(':senha', $senha, PDO::PARAM_STR);
            $result->bindParam(':foto', $novoNome, PDO::PARAM_STR);
            $result->execute();
            $contar = $result->rowCount();
            if ($contar > 0) {
              echo '<div class="msgform">Dados inserido com Sucesso :)</div>';
            } else {
              echo '<div class="msgform">Dados não inseridos :(</div>';
              header("Refresh");
            }
          } catch (PDOException $e) {
            echo '<div class="msgform"><strong>ERRO DE UPLOAD = </strong></div>' . $e->getMessage();
          }
        } else {
          echo '<div class="msgform">Erro não foi possível finalizar registro!</div>';
        }
      } else {
        echo '<div class="msgform">formato inválido</div>';
      }
    }
    ?>
  </div>
  <div class="tela-logo">
    <img src="../img/O_Evandro.png" alt="logo">
  </div>

</body>

</html>