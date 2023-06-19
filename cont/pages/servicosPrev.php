<style>
    .produtos {
        width: 100%;
        display: flex;
        justify-content: center;
        padding: 20px;
        align-items: center;
    }

    .box-produtos {
        width: 75%;
        background: #161a1b;
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
        width: 280px;
        height: 280px;
        border-radius: 20px;
        overflow: hidden;
    }

    .box-image-prod img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .market-place {
        width: calc(100% - 280px);
        height: 280px;
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
        font-size: 30px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .market-place .price-place {
        font-size: 22px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .estoque-carrinho {
        width: 70%;
        height: 40px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        position: absolute;
        bottom: 20px;
    }

    .estoque-carrinho button,
    .estoque-carrinho a {
        background-color: #5e5d5e;
        padding: 10px;
        border: 1px solid #5e5d5e;
        font-size: 20px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: #fff;
        text-decoration: none;
    }

    .quantidade-estoque {
        width: 150px;
        display: flex;
        align-items: center;
    }

    .quantidade-estoque span {
        width: 90px;
        height: 100%;
        font-size: 20px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #a6a6a6;
        margin: 0 5px;
    }

    .quantidade-estoque button,
    .quantidade-estoque a {
        width: 30px;
    }

    .estoque-carrinho button:hover,
    .estoque-carrinho a:hover {
        background: #201e20;
    }

    #addcar {
        border-radius: 20px;
    }

    .desc-info-prod {
        width: 100%;
        color: #fff;
        font-size: 18px;
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
<div class="produtos">
    <?php

    $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
    $select = "SELECT * FROM  servicos WHERE id_serv=:id ";

    try {
        $resultado = $conect->prepare($select);
        $resultado->bindParam(':id', $id, PDO::PARAM_INT);
        $resultado->execute();

        $contar = $resultado->rowCount();
        if ($contar > 0) {
            while ($show = $resultado->FETCH(PDO::FETCH_OBJ)) {
                $idConts = $show->id_serv;
                $nome = $show->nome_serv;
                $valor = $show->valor_serv;
                $desc = $show->desc_serv;
                $img = $show->img_serv;
            }
        } else {
            echo "não encontramos nada no nosso banco de dados";
        }
    } catch (PDOException $e) {
        echo "<strong>ERRO DE SELECT NO PDO = </strong>" . $e->getMessage();
    }
    ?>



    <div class="box-produtos">
        <div class="top-info-prod">
            <div class="box-image-prod">
                <img src="img/servicos/<?php echo $img ?>" alt="<?php echo $img ?>">
            </div>
            <div class="market-place">
                <p class="titulo-place"><?php echo $nome; ?></p>
                <div class="price-place">
                    <?php
                    /*
                    if ($valorAnt == "") {
                    } else {
                    ?>

                        <span><?php echo "R$:" . $valorAnt; ?></span>
                    <?php
                    }*/
                    ?>
                    <span><?php echo "R$:" . $valor; ?></span>
                </div>
                <div class="estoque-carrinho">
                    <!--<div class="quantidade-estoque">
                        <button id="Qmenos">-</button>
                        <span id="numberQ">1</span>
                        <button id="Qmais">+</button>
                    </div>-->
                    <a target="_blank" href="https://wa.me/+5585988705244" id="addcar">Negociar</a>
                    <script>

                    </script>
                </div>

            </div>
        </div>
        <div class="desc-info-prod">
            <p>
                <?php echo nl2br($desc); ?>
            </p>
            <div class="drop-class">
                <button type="button" class="drop-desc">ver mais</button>
            </div>
        </div>
    </div>


</div>