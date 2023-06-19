<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página ADM</title>
</head>

<style>
    .adm {
        width: 80%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 20px;
    }

    .area-upload-d1 {
        width: 100%;
        display: flex;
        flex-direction: row;
        border: 2px solid #df1d1d;
        border-radius: 20px;
        margin: 5px 0;
    }

    .box-upload {
        width: 30%;
        align-items: center;
        justify-content: center;
    }

    .box-upload form {
        width: 100%;
        padding: 10px;
        display: flex;
        justify-content: center;
        flex-direction: column;
    }

    .box-upload form input {
        width: 100%;
        padding: 5px;
        background: transparent;
        border: none;
        border: 2px solid #df1d1d;
        margin: 10px 0;
        color: #fff;
        border-radius: 5px;
        padding-left: 10px;
        outline: none;
    }

    .box-upload form textarea,
    .box-upload form button {
        width: 100%;
        padding: 5px;
        background: transparent;
        border: none;
        border: 2px solid #df1d1d;
        margin: 10px 0;
        color: #fff;
        border-radius: 5px;
        padding-left: 10px;
        outline: none;
    }

    .box-upload form button {
        width: 120px !important;
        text-transform: uppercase;
        font-size: 15px;
        font-weight: 700;
        padding-left: 0 !important;
    }

    .box-upload h2 {
        color: #fff;
        text-transform: uppercase;
        font-weight: 300;
        position: relative;
        margin-bottom: 20px;
        text-align: center;
    }

    .box-upload h2::after {
        content: "";
        position: absolute;
        width: 200px;
        height: 3px;
        background-color: #ff0000;
        bottom: -10px;
        left: 0;
        right: 0;
        margin: auto;
    }

    /*TABELA*/
    .tabela-adm {
        overflow: hidden;
        width: calc(100% - 30%);
        display: flex;
        justify-content: center;
        padding: 10px;
    }

    .tabela-adm ul {
        border: 2px solid #fff;
        max-height: 450px;
        display: flex;
        flex-direction: column;
        align-items: initial;
        width: 100%;
        overflow-y: scroll;
    }

    .tabela-adm ul li {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: row;
        padding: 10px;
        border: 1px solid #fff;
    }

    .tabela-adm .ft {
        width: 75px;
        height: 75px;
        border-right: 1px solid #fff;
        padding-right: 10px;
    }

    .tabela-adm .ft img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .tabela-adm .tx {
        height: 100%;
        padding: 10px;
        width: calc(100% - 75px - 150px);
        display: flex;
        align-items: center;
        position: relative;
    }

    .tabela-adm span {
        width: 100%;
        color: #fff;
        position: absolute;
        padding-right: 10px;
        z-index: 2;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .commands a {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .box-upload input[type="file"] {
        display: none;
    }

    @media (max-width: 920px) {
        .adm {
            width: 100%;
        }

        .area-upload-d1 {
            flex-direction: column;
        }

        .box-upload {
            width: 100%;
        }

        .box-upload h2 {
            font-size: 20px;
            margin: 10px;
        }

        .tabela-adm {
            width: 100%;
        }

        .tabela-adm ul {
            max-height: 250px;
        }

        .tabela-adm ul li {
            justify-content: space-between;
        }

        .tabela-adm .ft {
            width: 60px;
            height: 50px;
        }

        .tabela-adm .tx {
            width: calc(100% - 50px - 80px);
        }

        .commands {
            width: 80px;
            height: 40px;
        }
    }

    footer {
        display: none !important;
    }
</style>

<body>
    <div class="adm">
        <div class="area-upload-d1">
            <div class="box-upload">
                <h2>Cadastre produtos</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="nomeP" style="display: block;" id="" placeholder="nome do produto...">
                    <input type="text" name="valorP" style="display: block;" id="" placeholder="digite um valor ex: 100,00...">
                    <input type="number" name="quantidade" id="" placeholder="quantidade de estoque">
                    <input type="file" name="artP" id="artP">
                    <textarea name="descP" id="" cols="30" rows="5" placeholder="descreva o produto..."></textarea>
                    <div class="btn-contact">
                        <label for="artP">enviar art</label>
                        <button name="enviarP" type="submit">publicar</button>
                    </div>
                </form>
                <?php
                include_once("banco/conect.php");
                if (isset($_POST['enviarP'])) {
                    $nome = $_POST['nomeP'];
                    $formatP = array("png", "jpg", "JPG", "gif", "webp");
                    $extensao = pathinfo($_FILES['artP']['name'], PATHINFO_EXTENSION);
                    $valor = $_POST['valorP'];
                    $desc = $_POST['descP'];
                    $quant = $_POST['quantidade'];

                    if (in_array($extensao, $formatP)) {
                        $pasta = "img/produtos/";
                        $temporario = $_FILES['artP']['tmp_name'];
                        $novoNome = uniqid() . ".$extensao";

                        if (move_uploaded_file($temporario, $pasta . $novoNome)) {
                            $inserir = "INSERT INTO loja (nome_prod,desc_prod,valor_prod,art_prod,quant_prod) VALUES (:nomeP,:descr,:valor,:artP,:quant)";
                            try {
                                $result = $conect->prepare($inserir);
                                $result->bindParam(':nomeP', $nome, PDO::PARAM_STR);
                                $result->bindParam(':descr', $desc, PDO::PARAM_STR);
                                $result->bindParam(':valor', $valor, PDO::PARAM_STR);
                                $result->bindParam(':quant', $quant, PDO::PARAM_STR);
                                $result->bindParam(':artP', $novoNome, PDO::PARAM_STR);
                                $result->execute();
                                $contar = $result->rowCount();
                                if ($contar > 0) {
                                    echo '<div style="width:100%; padding:10px;color:#02c415;">produto inserido com Sucesso :)</div>';
                                    header("Refresh: 2, index.php?acao=adm");
                                } else {
                                    echo '<div style="width:100%; padding:10px;color:#e00404;">Dados não inseridos :(</div>';
                                    header("Refresh");
                                }
                            } catch (PDOException $e) {
                                echo "<strong>ERRO DE UPLOAD = </strong>" . $e->getMessage();
                            }
                        } else {
                            echo '<div style="width:100%; padding:10px;color:#e00404;">Erro não foi possível fazer upload do produto!</div>';
                        }
                    } else {
                        echo '<div style="width:100%; padding:10px;color:#f07f07;">formato inválido</div>';
                    }
                }
                ?>
            </div>
            <div class="tabela-adm">
                <ul>
                    <?php

                    $select = "SELECT * FROM loja ORDER BY id_prod DESC";
                    try {
                        $result = $conect->prepare($select);
                        $cont = 1;
                        $result->execute();
                        $contar = $result->rowCount();
                        if ($contar > 0) {
                            while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
                    ?>
                                <li>
                                    <div class="ft">
                                        <img src="img/produtos/<?php echo $show->art_prod ?>" alt="<?php echo $show->art_prod ?>">
                                    </div>
                                    <div class="tx ">
                                        <span><?php echo $show->nome_prod ?></span>
                                    </div>
                                    <div class="commands">
                                        <a href="index.php?acao=upP&idUp= <?php echo $show->id_prod; ?>" id="btn_tbEd">
                                            <img width="20px" height="20px" src="img/img_site/icons8-editar.png" alt="">
                                        </a>

                                        <a href="delete.php?idDel= <?php echo $show->id_prod; ?>" onclick="return confirm('Deseja remover o produto')" id="btn_tbEx">
                                            <svg fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26" width="20px" height="20px">
                                                <path d="M 11 -0.03125 C 10.164063 -0.03125 9.34375 0.132813 8.75 0.71875 C 8.15625 1.304688 7.96875 2.136719 7.96875 3 L 4 3 C 3.449219 3 3 3.449219 3 4 L 2 4 L 2 6 L 24 6 L 24 4 L 23 4 C 23 3.449219 22.550781 3 22 3 L 18.03125 3 C 18.03125 2.136719 17.84375 1.304688 17.25 0.71875 C 16.65625 0.132813 15.835938 -0.03125 15 -0.03125 Z M 11 2.03125 L 15 2.03125 C 15.546875 2.03125 15.71875 2.160156 15.78125 2.21875 C 15.84375 2.277344 15.96875 2.441406 15.96875 3 L 10.03125 3 C 10.03125 2.441406 10.15625 2.277344 10.21875 2.21875 C 10.28125 2.160156 10.453125 2.03125 11 2.03125 Z M 4 7 L 4 23 C 4 24.652344 5.347656 26 7 26 L 19 26 C 20.652344 26 22 24.652344 22 23 L 22 7 Z M 8 10 L 10 10 L 10 22 L 8 22 Z M 12 10 L 14 10 L 14 22 L 12 22 Z M 16 10 L 18 10 L 18 22 L 16 22 Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </li>
                    <?php
                            }
                        } else {
                        }
                    } catch (PDOException $e) {
                        echo "<strong>ERRO DE PDO = </strong>" . $e->getMessage();
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="area-upload-d1">
            <div class="box-upload">
                <h2>Cadastre Serviços</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="nomeS" id="" placeholder="nome do serviço...">
                    <input type="text" name="valorS" id="" placeholder="digite um valor ex: 100,00...">
                    <input type="file" name="artS" id="artS">
                    <textarea name="descS" id="" cols="30" rows="5" placeholder="descreva o Serviço..."></textarea>
                    <div class="btn-contact">
                        <label for="artS">enviar art</label>
                        <button name="enviarS" type="submit">publicar</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['enviarS'])) {
                    $nomeS = $_POST['nomeS'];
                    $formatS = array("png", "jpg", "JPG", "gif", "webp", "jpeg");
                    $extensaoS = pathinfo($_FILES['artS']['name'], PATHINFO_EXTENSION);
                    $valorS = $_POST['valorS'];
                    $descS = $_POST['descS'];

                    if (in_array($extensaoS, $formatS)) {
                        $pastaS = "img/servicos/";
                        $temporarioS = $_FILES['artS']['tmp_name'];
                        $novoNomeS = uniqid() . ".$extensaoS";

                        if (move_uploaded_file($temporarioS, $pastaS . $novoNomeS)) {
                            $inserir = "INSERT INTO servicos (nome_serv,desc_serv,valor_serv,img_serv) VALUES (:nomeS,:descrS,:valorS,:artS)";
                            try {
                                $result = $conect->prepare($inserir);
                                $result->bindParam(':nomeS', $nomeS, PDO::PARAM_STR);
                                $result->bindParam(':descrS', $descS, PDO::PARAM_STR);
                                $result->bindParam(':valorS', $valorS, PDO::PARAM_STR);
                                $result->bindParam(':artS', $novoNomeS, PDO::PARAM_STR);
                                $result->execute();
                                $contar = $result->rowCount();
                                if ($contar > 0) {
                                    echo '<div style="width:100%; padding:10px;color:#02c415;">Serviço inserido com Sucesso :)</div>';
                                    header("Refresh: 2, index.php?acao=adm");
                                } else {
                                    echo '<div style="width:100%; padding:10px;color:#e00404;">Dados não inseridos :(</div>';
                                    header("Refresh");
                                }
                            } catch (PDOException $e) {
                                echo "<strong>ERRO DE UPLOAD = </strong>" . $e->getMessage();
                            }
                        } else {
                            echo '<div style="width:100%; padding:10px;color:#e00404;">Erro não foi possível fazer upload do serviço!</div>';
                        }
                    } else {
                        echo '<div style="width:100%; padding:10px;color:#f07f07;">formato inválido</div>';
                    }
                }
                ?>
            </div>
            <div class="tabela-adm">
                <ul>
                    <?php

                    $select = "SELECT * FROM servicos ORDER BY id_serv DESC";
                    try {
                        $result = $conect->prepare($select);
                        $cont = 1;
                        $result->execute();
                        $contar = $result->rowCount();
                        if ($contar > 0) {
                            while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
                    ?>
                                <li>
                                    <div class="ft">
                                        <img src="img/servicos/<?php echo $show->img_serv ?>" alt="<?php echo $show->img_serv ?>">
                                    </div>
                                    <div class="tx ">
                                        <span><?php echo $show->nome_serv ?></span>
                                    </div>
                                    <div class="commands">
                                        <a href="index.php?acao=upS&idUp= <?php echo $show->id_serv; ?>" id="btn_tbEd">
                                            <img width="20px" height="20px" src="img/img_site/icons8-editar.png" alt="icon editar">
                                        </a>
                                        <a href="delete.php?idDel= <?php echo $show->id_serv; ?>" onclick="return confirm('Deseja remover o produto')" id="btn_tbEx">
                                            <svg fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26" width="20px" height="20px">
                                                <path d="M 11 -0.03125 C 10.164063 -0.03125 9.34375 0.132813 8.75 0.71875 C 8.15625 1.304688 7.96875 2.136719 7.96875 3 L 4 3 C 3.449219 3 3 3.449219 3 4 L 2 4 L 2 6 L 24 6 L 24 4 L 23 4 C 23 3.449219 22.550781 3 22 3 L 18.03125 3 C 18.03125 2.136719 17.84375 1.304688 17.25 0.71875 C 16.65625 0.132813 15.835938 -0.03125 15 -0.03125 Z M 11 2.03125 L 15 2.03125 C 15.546875 2.03125 15.71875 2.160156 15.78125 2.21875 C 15.84375 2.277344 15.96875 2.441406 15.96875 3 L 10.03125 3 C 10.03125 2.441406 10.15625 2.277344 10.21875 2.21875 C 10.28125 2.160156 10.453125 2.03125 11 2.03125 Z M 4 7 L 4 23 C 4 24.652344 5.347656 26 7 26 L 19 26 C 20.652344 26 22 24.652344 22 23 L 22 7 Z M 8 10 L 10 10 L 10 22 L 8 22 Z M 12 10 L 14 10 L 14 22 L 12 22 Z M 16 10 L 18 10 L 18 22 L 16 22 Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </li>
                    <?php
                            }
                        } else {
                        }
                    } catch (PDOException $e) {
                        echo "<strong>ERRO DE PDO = </strong>" . $e->getMessage();
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>