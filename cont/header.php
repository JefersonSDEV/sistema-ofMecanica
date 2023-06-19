<?php
ob_start();
session_start();
if (!isset($_SESSION['loginUser']) && (!isset($_SESSION['senhaUser']))) {
    header('<div class="loginmsg">faça login e aproveite os benefícios</div>');
    include_once("banco/conect.php");
    $usuarioLogado = "user@user.com";
    $senhaDoUsuario = "";
    $selectUser = "SELECT * FROM users WHERE email_user=:emailUserLogado AND senha=:senhaUserLogado";

    try {
        $resultadoUser = $conect->prepare($selectUser);
        $resultadoUser->bindParam(':emailUserLogado', $usuarioLogado, PDO::PARAM_STR);
        $resultadoUser->bindParam(':senhaUserLogado', $senhaDoUsuario, PDO::PARAM_STR);
        $resultadoUser->execute();

        $contar = $resultadoUser->rowCount();
        if ($contar > 0) {
            while ($show = $resultadoUser->FETCH(PDO::FETCH_OBJ)) {
                $id_user = $show->id_user;
                $foto_user = $show->img_user;
                $nome_user = $show->nome_user;
                $email_user = $show->email_user;
                $senha_user = $show->senha;
            }
        } else {
            echo '<div class="alert alert-danger"> <strong>Aviso!</strong> Não há dados com de perfil :(</div>';
        }
    } catch (PDOException $e) {
        echo "ERRO DE LOGIN DO PDO : " . $e->getMessage();
    }
} else {
    include_once("banco/conect.php");
    $usuarioLogado = $_SESSION['loginUser'];
    $senhaDoUsuario = base64_encode($_SESSION['senhaUser']);
    $selectUser = "SELECT * FROM users WHERE email_user=:emailUserLogado AND senha=:senhaUserLogado";

    try {
        $resultadoUser = $conect->prepare($selectUser);
        $resultadoUser->bindParam(':emailUserLogado', $usuarioLogado, PDO::PARAM_STR);
        $resultadoUser->bindParam(':senhaUserLogado', $senhaDoUsuario, PDO::PARAM_STR);
        $resultadoUser->execute();

        $contar = $resultadoUser->rowCount();
        if ($contar > 0) {
            while ($show = $resultadoUser->FETCH(PDO::FETCH_OBJ)) {
                $id_user = $show->id_user;
                $foto_user = $show->img_user;
                $nome_user = $show->nome_user;
                $email_user = $show->email_user;
                $senha_user = $show->senha;
            }
        } else {
            echo '<div class="alert alert-danger"> <strong>Aviso!</strong> Não há dados com de perfil :(</div>';
        }
    } catch (PDOException $e) {
        echo "ERRO DE LOGIN DO PDO : " . $e->getMessage();
    }
}
include_once('cont/sair.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <script src="style/script.js" defer></script>
    <link rel="stylesheet" href="style/styleLoja.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="shortcut icon" href="img/img_site/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Oficina O Evandro</title>
</head>

<body>


    <header>
        <div class="menu">
            <div class="top">
                <div class="social">
                    <div class="social-s" style="width: 100px; height: 20px;">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                        <a href="#"></a>
                        <a href="#"></a>
                        <!-- Add font awesome icons 
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-twitter"></a>-->
                    </div>
                </div>
                <div class="sanduiche">
                    <input id="menu-hamburguer" type="checkbox" />

                    <label for="menu-hamburguer">
                        <div class="menu-sand">
                            <span class="hamburguer"></span>
                        </div>
                    </label>
                </div>
                <div class="logo"><img src="img/O_Evandro.png" alt=""></div>
                <div class="custom-user">
                    <div class="login"><img style="width: 20px;" src="img/img_site/trancar.png" alt=""></div>
                </div>
                <ul class="links">
                    <!--<a href="index.php?acao=upProd">upload produtos</a>
                    <a href="index.php?acao=upServ">upload serviços</a>
                    <a href="index.php?acao=tbProd">tabela de produtos</a>-->
                    <a href="cont/login.php">login</a>
                    <a href="cont/registro.php">cadastro</a>
                    <?php
                    if ($email_user == "admin@ofice") { ?>
                        <a href="index.php?acao=adm" style="color:#e00404;">adm</a>
                    <?php
                    } else { ?>
                    <?php } ?>
                    <a href="?sair">sair</a>
                </ul>
            </div>
            <div class="menu-ul">
                <div class="inner-l"></div>
                <ul>
                    <a href="index.php?acao=home">início</a>
                    <a href="index.php?acao=home#sobre">sobre</a>
                    <a href="index.php?acao=servicos">serviços</a>
                    <a href="index.php?acao=loja">loja</a>
                    <a href="index.php?acao=contato">contato</a>
                    <a href="index.php?acao=faq">faq</a>
                    <div class="car">
                        <img src="img/img_site/output.png" alt="">
                    </div>
                </ul>
                <div class="inner-r"></div>
            </div>


        </div>
    </header>
    <div class="menu-ul-alternative">
        <ul>
            <a href="index.php?acao=home">início</a>
            <a href="index.php?acao=home#sobre">sobre</a>
            <a href="index.php?acao=servicos">serviços</a>
            <a href="index.php?acao=loja">loja</a>
            <a href="index.php?acao=contato">contato</a>
            <a href="index.php?acao=faq">faq</a>
        </ul>
    </div>