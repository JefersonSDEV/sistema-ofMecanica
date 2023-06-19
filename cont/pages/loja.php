<div class="loja">
    <h2><b>PRODUTOS</b> EM DESTAQUE</h2>
    <div class="area-absolut-carroussel">
        <style>
            .area-absolut-carroussel {
                position: relative;
                width: 100%;
                height: 310px;
            }

            #c {
                position: absolute !important;
                width: 100% !important;
                height: 300px !important;
            }

            #c>#mode-desktop-carroussel{
                width: 10%;
                position: absolute;
                top: 0;
                height: 300px;
                opacity: 0;
                transition: 2s opacity;
            }
            #c>#loja-responsive-mobile {
                width: 50%;
                position: absolute;
                top: 0;
                height: 300px;
                opacity: 0;
                transition: 2s opacity;
                justify-content: center;
            }

            .active {
                opacity: 1 !important;
            }
            #loja-responsive-mobile{
                display: none;
            }
            @media (max-width: 920px) {
                #mode-desktop-carroussel{
                    display: none;
                }
                #loja-responsive-mobile{
                    display: flex;
                }
            }
        </style>
        <script>
            var timer = 5000;

            var i = 0;
            var max = $('#c > #mode-desktop-carroussel').length;

            $("#c > #mode-desktop-carroussel").eq(i).addClass('active').css('left', '0');
            $("#c > #mode-desktop-carroussel").eq(i + 1).addClass('active').css('left', '10%');
            $("#c > #mode-desktop-carroussel").eq(i + 2).addClass('active').css('left', '20%');
            $("#c > #mode-desktop-carroussel").eq(i + 3).addClass('active').css('left', '30%');
            $("#c > #mode-desktop-carroussel").eq(i + 4).addClass('active').css('left', '40%');
            $("#c > #mode-desktop-carroussel").eq(i + 5).addClass('active').css('left', '50%');
            $("#c > #mode-desktop-carroussel").eq(i + 6).addClass('active').css('left', '60%');
            $("#c > #mode-desktop-carroussel").eq(i + 7).addClass('active').css('left', '70%');
            $("#c > #mode-desktop-carroussel").eq(i + 8).addClass('active').css('left', '80%');
            $("#c > #mode-desktop-carroussel").eq(i + 9).addClass('active').css('left', '90%');


            setInterval(function() {

                $("#c > #mode-desktop-carroussel").removeClass('active');

                $("#c > #mode-desktop-carroussel").eq(i).css('transition-delay', '0.25s');
                $("#c > #mode-desktop-carroussel").eq(i + 1).css('transition-delay', '0.5s');
                $("#c > #mode-desktop-carroussel").eq(i + 2).css('transition-delay', '0.75s');
                $("#c > #mode-desktop-carroussel").eq(i + 3).css('transition-delay', '1s');
                $("#c > #mode-desktop-carroussel").eq(i + 4).css('transition-delay', '1.25s');
                $("#c > #mode-desktop-carroussel").eq(i + 5).css('transition-delay', '1.5s');
                $("#c > #mode-desktop-carroussel").eq(i + 6).css('transition-delay', '1.75s');
                $("#c > #mode-desktop-carroussel").eq(i + 7).css('transition-delay', '2s');
                $("#c > #mode-desktop-carroussel").eq(i + 8).css('transition-delay', '2.25s');
                $("#c > #mode-desktop-carroussel").eq(i + 9).css('transition-delay', '2.5s');

                if (i < max + 10) {
                    i = i + 10;
                } else {
                    i = 0;
                }

                $("#c > #mode-desktop-carroussel").eq(i).css('left', '0').addClass('active').css('transition-delay', '1.25s');
                $("#c > #mode-desktop-carroussel").eq(i + 1).css('left', '10%').addClass('active').css('transition-delay', '1.5s');
                $("#c > #mode-desktop-carroussel").eq(i + 2).css('left', '20%').addClass('active').css('transition-delay', '1.75s');
                $("#c > #mode-desktop-carroussel").eq(i + 3).css('left', '30%').addClass('active').css('transition-delay', '2s');
                $("#c > #mode-desktop-carroussel").eq(i + 4).css('left', '40%').addClass('active').css('transition-delay', '2.25s');
                $("#c > #mode-desktop-carroussel").eq(i + 5).css('left', '50%').addClass('active').css('transition-delay', '2.5s');
                $("#c > #mode-desktop-carroussel").eq(i + 6).css('left', '60%').addClass('active').css('transition-delay', '2.75s');
                $("#c > #mode-desktop-carroussel").eq(i + 7).css('left', '70%').addClass('active').css('transition-delay', '3s');
                $("#c > #mode-desktop-carroussel").eq(i + 8).css('left', '80%').addClass('active').css('transition-delay', '3.25s');
                $("#c > #mode-desktop-carroussel").eq(i + 9).css('left', '90%').addClass('active').css('transition-delay', '3.5s');


            }, timer);

            /*RESPONSIVO / MOBILE*/

            var timer = 4000;

            var i = 0;
            var max = $('#c > #loja-responsive-mobile').length;

            $("#c > #loja-responsive-mobile").eq(i).addClass('active').css('left', '0');
            $("#c > #loja-responsive-mobile").eq(i + 1).addClass('active').css('left', '50%');


            setInterval(function() {

                $("#c > #loja-responsive-mobile").removeClass('active');

                $("#c > #loja-responsive-mobile").eq(i).css('transition-delay', '0.25s');
                $("#c > #loja-responsive-mobile").eq(i + 1).css('transition-delay', '0.5s');

                if (i > max + 2) {
                    i = i + 2;
                } else {
                    i = 0;
                }

                $("#c > #loja-responsive-mobile").eq(i).css('left', '0').addClass('active').css('transition-delay', '1.25s');
                $("#c > #loja-responsive-mobile").eq(i + 1).css('left', '50%').addClass('active').css('transition-delay', '1.5s');


            }, timer);

        </script>
        <ul id="c">

            <?php
            include_once("banco/conect.php");
            $select = "SELECT * FROM loja ORDER BY id_prod ASC LIMIT 30";
            try {
                $result = $conect->prepare($select);
                $cont = 1;
                $result->execute();
                $contar = $result->rowCount();
                if ($contar > 0) {
                    while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
            ?>
                        <li id="mode-desktop-carroussel">
                            <div class="card">
                                <div class="like"></div>
                                <img class="product" src="img/produtos/<?php echo $show->art_prod ?>" alt="Foto do produtos - <?php echo $show->art_prod ?>" />
                                <h4 class="title" title="<?php echo $show->nome_prod ?>"><?php echo $show->nome_prod ?></h4>
                                <div class="price">
                                    <?php
                                    if ($show->valorAnt_prod == "") {
                                    ?>
                                    <?php
                                    } else {
                                    ?>
                                        <h5 id="first-child">R$
                                            <?php echo " $show->valorAnt_prod"; ?>
                                        </h5>
                                    <?php
                                    }
                                    ?>
                                    <h5 id="last-child">
                                        R$
                                        <?php echo $show->valor_prod ?>
                                    </h5>
                                </div>
                                <a class="button" href="index.php?acao=ProdutosPrev&id=<?php echo $show->id_prod ?>">Visualizar</a>
                            </div>
                        </li>

                        <div id="loja-responsive-mobile">
                            <div class="card">
                                <div class="like"></div>
                                <img class="product" src="img/produtos/<?php echo $show->art_prod ?>" alt="Foto do produtos - <?php echo $show->art_prod ?>" />
                                <h4 class="title" title="<?php echo $show->nome_prod ?>"><?php echo $show->nome_prod ?></h4>
                                <div class="price">
                                    <?php
                                    if ($show->valorAnt_prod == "") {
                                    ?>
                                    <?php
                                    } else {
                                    ?>
                                        <h5 id="first-child">R$
                                            <?php echo " $show->valorAnt_prod"; ?>
                                        </h5>
                                    <?php
                                    }
                                    ?>
                                    <h5 id="last-child">
                                        R$
                                        <?php echo $show->valor_prod ?>
                                    </h5>
                                </div>
                                <a class="button" href="index.php?acao=ProdutosPrev&id=<?php echo $show->id_prod ?>">Visualizar</a>
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

        </ul>
        <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdpn.io/cpe/boomboom/pen.js?key=pen.js-bc5da96a-d465-073a-6971-8a1deab6b02b" crossorigin=""></script>
    </div>

    <div class="lojaCont">
        <?php
        include_once("banco/conect.php");
        $select = "SELECT * FROM loja ORDER BY id_prod DESC LIMIT 20";
        try {
            $result = $conect->prepare($select);
            $cont = 1;
            $result->execute();
            $contar = $result->rowCount();
            if ($contar > 0) {
                while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
        ?>
                    <a href="index.php?acao=ProdutosPrev&id=<?php echo $show->id_prod ?>">
                        <img src="img/produtos/<?php echo $show->art_prod ?>" alt="">
                        <h4 class="title" title="<?php echo $show->nome_prod ?>">
                            <?php echo $show->nome_prod ?>
                        </h4>
                        <div class="price">
                            <?php
                            if ($show->valorAnt_prod == "") {
                            ?>
                            <?php
                            } else {
                            ?>
                                <h5 id="first-child">R$
                                    <?php echo " $show->valorAnt_prod"; ?>
                                </h5>
                            <?php
                            }
                            ?>
                            <h5 id="last-child">
                                R$
                                <?php echo $show->valor_prod ?>
                            </h5>
                        </div>
                    </a>
        <?php
                }
            } else {
            }
        } catch (PDOException $e) {
            echo "<strong>ERRO DE PDO = </strong>" . $e->getMessage();
        }
        ?>
    </div>