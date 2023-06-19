<style>
    .area-services {
        width: 100%;
        display: table;
        padding: 0 5px;
    }

    .box-server-container {
        float: left;
        width: 25%;
        display: flex;
        justify-content: center;
        padding: 5px;
    }

    .boxer-services:hover {
        opacity: 0.5;
    }

    .area-services .boxer-services {
        width: 100%;
        display: flex;
        justify-content: center;
        background: #ffffff0f;
        padding: 20px;
        border-radius: 10px;
    }

    .boxer-services #img-services {
        width: 100%;
        height: 100%;
    }

    .title-mobile {
        width: 100px;
        height: 100px;
        border: 5px solid #ff0000;
        border-radius: 100%;
        margin-right: 10px;
        overflow: hidden;
    }

    .title-mobile h3 {
        color: #fff;
        display: none;
        width: 100%;
        font-size: 20px;
        font-weight: 700;
        text-align: justify;
        transition: .2s all ease-in-out;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        text-transform: uppercase;
        width: calc(100% - 100px);
    }

    .info-desc-services {
        width: calc(100% - 150px);
        color: #fff;
        display: flex;
        flex-direction: column;
    }

    .info-desc-services h3 {
        width: 100%;
        font-size: 20px;
        font-weight: 700;
        text-align: justify;
        transition: .2s all ease-in-out;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        text-transform: uppercase;
    }

    .info-desc-services p {
        width: 100%;
        margin-bottom: 10px;
        font-size: 15px;
        font-weight: 700;
        text-align: justify;
        max-height: 110px;
        overflow: hidden;
    }

    #access-serv {
        width: 120px;
        padding: 10px;
        background: #ff0000;
        text-align: center;
        color: #fff;
        text-decoration: none;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 700;
        text-transform: uppercase;
        border: 1.3px solid #fff;
        transition: .4s ease-in-out;
    }

    #access-serv:hover {
        background: transparent;
        border: 1.3px solid #fff;
    }

    @media (max-width: 920px) {
        .area-services .boxer-services {
            flex-direction: column;
        }

        .box-server-container {
            width: 100%;
        }

        .info-desc-services {
            width: 100%;
        }

        .boxer-services #img-services {
            width: 100px;
            height: 100px;
            border: 3px solid #ff0000;
            border-radius: 100%;
        }

        .info-desc-services p {
            font-size: 13px;
            max-height: 55px;
            overflow: hidden;
        }

        #access-serv {
            width: 100%;
            padding: 7px;
        }

        .title-mobile {
            border: none;
            border-radius: 0;
        }

        .title-mobile h3 {
            display: block;
            width: calc(100% - 110px);
            position: absolute;
            right: 0;
            text-align: initial;
        }

        .info-desc-services h3 {
            display: none;
        }

        .title-mobile {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
            margin-right: 0;
        }
    }
</style>
<div class="area-services">
    <?php

    include_once("banco/conect.php");
    $select = "SELECT * FROM servicos ORDER BY id_serv ASC LIMIT 100";
    try {
        $result = $conect->prepare($select);
        $cont = 1;
        $result->execute();
        $contar = $result->rowCount();
        if ($contar > 0) {
            while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
    ?>
                <div class="box-server-container" title="<?php echo $show->nome_serv ?>">
                    <div class="boxer-services">
                        <div class="title-mobile">
                            <img id="img-services" src="img/servicos/<?php echo $show->img_serv ?>" alt="<?php echo $show->img_serv ?>">
                            <h3>
                                <?php echo $show->nome_serv ?>
                            </h3>
                        </div>
                        <div class="info-desc-services">
                            <h3>
                                <?php echo $show->nome_serv ?>
                            </h3>
                            <p>
                                <?php echo $show->desc_serv ?>
                            </p>
                            <a id="access-serv" href="index.php?acao=servicosPrev&id=<?php echo $show->id_serv ?>">acessar</a>
                        </div>
                    </div>
                </div>
    <?php
            }
        } else {
        }
    } catch (PDOException $e) {
        echo "<strong>ERRO DE PDO = </strong>" . $e->getMessage();
    }
    ?>
</div>