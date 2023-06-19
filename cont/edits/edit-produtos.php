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
        height: 600px;
        display: flex;
        flex-direction: row;
        border: 2px solid #df1d1d;
        border-radius: 20px;
        margin: 10px;
        overflow: hidden;
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

    .adm h2 {
        color: #fff;
        text-transform: uppercase;
        font-weight: 300;
        position: relative;
        margin-bottom: 20px;
        text-align: center;
    }

    .adm h2::after {
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


    .produtos {
        width: calc(100% - 30%);
        display: flex;
        justify-content: right;
        padding: 20px;
        align-items: start;
        overflow: hidden;
        overflow-y: scroll;
    }

    .box-produtos {
        width: 75%;
        border-radius: 20px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .top-info-prod {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .box-image-prod {
        width: 100px;
        height: 100px;
        border-radius: 20px;
        overflow: hidden;
    }

    .box-image-prod img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .market-place {
        width: calc(100% - 100px);
        height: 100px;
        display: flex;
        color: #fff;
        flex-direction: column;
        padding: 0 20px;
        position: relative;
    }

    .market-place .titulo-place,
    .market-place .price-place {
        width: 100%;
    }

    .market-place .titulo-place {
        font-size: 20px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .market-place .price-place {
        font-size: 15px;
        font-weight: 700;
        text-transform: uppercase;
    }


    .desc-info-prod {
        width: 100%;
        color: #fff;
        font-size: 15px;
        font-weight: 700;
        padding: 20px 0;
        position: relative;
    }

    .desc-info-prod p {
        min-height: 280px;
        max-height: 280px;
        overflow: hidden;
    }

    .rows-sets {
        border-radius: 20px;
        width: 75px;
        color: #fff;
        height: 50px;
        text-align: center;
        background: #161a1b;
        margin: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 50px;
        text-transform: uppercase;
        font-weight: 700;
    }

    .rows-sets a {
        color: #fff;
        text-decoration: none;
    }

    @media (max-width: 920px) {
        .box-produtos {
            width: 100% !important;
            padding: 10px !important;
        }

        .top-info-prod {
            align-items: inherit;
        }

        .box-image-prod {
            width: 120px;
            height: 120px;
        }

        .market-place {
            width: calc(100% - 120px);
            height: 120px;
        }

        .market-place .titulo-place {
            font-size: 20px;
        }

        .market-place .price-place {
            font-size: 18px;
        }

        .estoque-carrinho {
            width: 100%;
            position: initial;
        }

        .estoque-carrinho button,
        .estoque-carrinho a {
            width: 100%;
            background-color: #5e5d5e;
            padding: 4px;
            border: 1px solid #5e5d5e;
            font-size: 16px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: #fff;
            text-decoration: none;
        }

        #addcar {
            border-radius: 13px;
        }

        p {
            margin: 0 0 0;
        }
    }

    .drop-class {
        width: 100%;
        position: absolute;
        bottom: -50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .drop-desc {
        width: 50%;
        background: #201e20;
        border: none;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
        text-transform: uppercase;
        font-size: 15px;
        font-weight: 700;
        padding: 5px;
        transition: 0.5s ease-in-out;
        border: 1px solid #201e20;
        cursor: pointer;
    }

    .drop-desc:hover {
        background: #5e5d5e !important;
    }
</style>

<body>
    <?php
    if (!isset($_GET['idUp'])) {
        header("Location: index.php");
        exit;
    }

    $id = filter_input(INPUT_GET, 'idUp', FILTER_DEFAULT);

    $select = "SELECT * FROM loja  WHERE id_prod=:id";

    try {
        $resultado = $conect->prepare($select);
        $resultado->bindParam(':id', $id, PDO::PARAM_INT);
        $resultado->execute();

        $contar = $resultado->rowCount();
        if ($contar > 0) {
            while ($show = $resultado->FETCH(PDO::FETCH_OBJ)) {
                $id_contato = $show->id_prod;
                $nomeed = $show->nome_prod;
                $descricao = $show->desc_prod;
                $valorAnt = $show->valorAnt_prod;
                $valored = $show->valor_prod;
                $foto = $show->art_prod;
                $quantidade = $show->quant_prod;
            }
        } else {
            '<div style="margim-top 100px;"
            class="alert alert-danger" role="alert">
            Dados não encostrados!!!
          </div>';
        }
    } catch (PDOException $e) {
        echo '<strong>ERRO DE DELETE = </strong>' . $e->getMessage();
    }
    ?>
    <div class="adm">
        <h2>Edite produtos</h2>
        <div class="area-upload-d1">
            <div class="box-upload">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="nome" style="display: block;" id="" placeholder="nome do produto..." value="<?php echo $nomeed; ?>">
                    <input type="text" name="valorS" style="display: none;" id="" placeholder="digite um valor ex: 100,00..." value="<?php echo $valored; ?>">
                    <input type="text" name="valorP" style="display: block;" id="" placeholder="digite um valor ex: 100,00..." value="<?php echo $valored; ?>">
                    <input type="number" name="quantidade" id="" value="<?php echo $quantidade; ?>">
                    <input type="file" name="foto" id="artP">
                    <textarea name="descP" id="" cols="30" rows="5" placeholder="descreva o produto..."><?php echo $descricao; ?></textarea>
                    <div class="btn-contact">
                        <label for="artP">enviar art</label>
                        <button name="enviarP" type="submit">publicar</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['enviarP'])) {
                    $nomeT = $_POST['nome'];
                    $valorS = $_POST['valorS'];
                    $valorP = $_POST['valorP'];
                    $descP = $_POST['descP'];
                    $quant = $_POST['quantidade'];
                    if (!empty($_FILES['foto']['name'])) {
                        $formatP = array("png", "jpg", "JPG", "gif", "webp");
                        $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

                        if (in_array($extensao, $formatP)) {
                            $pasta = "img/produtos/";
                            $temporario = $_FILES['foto']['tmp_name'];
                            $novoNome = uniqid() . ".{$extensao}";


                            if (move_uploaded_file($temporario, $pasta . $novoNome)) {
                            } else {
                                echo '<div style="width:100%; padding:10px;color:#e00404;">Erro não foi possível fazer o upload do Produto !</div>';
                            }
                        } else {
                            echo "formato invalido";
                        }
                    } else {
                        $novoNome = $foto;
                    }
                    $update = "UPDATE loja SET nome_prod=:nome,valor_prod=:valor,valorAnt_prod=:valorA,art_prod=:art,desc_prod=:descricao,quant_prod=:quant WHERE id_prod=:id";
                    try {
                        $resultado = $conect->prepare($update);
                        $resultado->bindParam(':id', $id, PDO::PARAM_STR);
                        $resultado->bindParam(':nome', $nomeT, PDO::PARAM_STR);
                        $resultado->bindParam(':valorA', $valorS, PDO::PARAM_STR);
                        $resultado->bindParam(':valor', $valorP, PDO::PARAM_STR);
                        $resultado->bindParam(':descricao', $descP, PDO::PARAM_STR);
                        $resultado->bindParam(':quant', $quant, PDO::PARAM_STR);
                        $resultado->bindParam(':art', $novoNome, PDO::PARAM_STR);
                        $resultado->execute();
                        $contarado = $resultado->rowCount();
                        if ($contar > 0) {
                            echo '<div style="width:100%; padding:10px;color:#02c415;">Produto Atualizado com Sucesso :)</div>';
                            header("Refresh: 2");
                        } else {
                            echo '<div style="width:100%; padding:10px;color:#e00404;">Produto NÃO foi Atualizado :(</div>';
                            header("Refresh");
                        }
                    } catch (PDOException $e) {
                        echo "<strong>ERRO DE PDO = </strong>" . $e->getMessage();
                    }
                }

                ?>
            </div>
            <div class="produtos">
                <div class="box-produtos">
                    <div class="top-info-prod">
                        <div class="box-image-prod">
                            <img src="img/produtos/<?php echo $foto ?>" alt="<?php echo $foto ?>">
                        </div>
                        <div class="market-place">
                            <p class="titulo-place">
                                <?php echo $nomeed; ?>
                            </p>
                            <div class="price-place">
                                <span>
                                    <?php echo "R$: " . $valored; ?>
                                </span>
                                <br>

                                <?php if ($valorAnt <= 0) { ?>
                                    
                                <?php } else { ?>
                                    <span style="color:#ff0000;"><?php echo "R$: " . $valorAnt; ?></span>
                                <?php } ?>
                                <br>
                                <span><?php echo "quantidade: " . $quantidade; ?></span>

                            </div>

                        </div>
                    </div>
                    <div class="desc-info-prod">
                        <br>
                        <p>
                            <?php echo nl2br($descricao); ?>
                        </p>
                        <div class="drop-class">
                            <button type="button" class="drop-desc">ver mais</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>