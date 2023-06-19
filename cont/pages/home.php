<div class="row">
    <?php

    include_once("banco/conect.php");
    $select = "SELECT * FROM home ORDER BY id_home DESC";
        try {
            $result = $conect->prepare($select);
            $cont = 1;
            $result->execute();
            $contar = $result->rowCount();
            if ($contar > 0) {
                while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
                    ?>
                    <div class="entry-header">
                        <div class="containerh">
                            <div class="entry-title">
                                <!---<h2 class="h1">
                                    <?php echo $show->nome_emp?>
                                </h2>-->
                            </div>
                        </div>
                    </div>
                    <div class="desc" id="sobre">
                        <div class="line-desc">
                            <span>Sobre Nós</span>
                            <div class="line"></div>
                        </div>
                        <div class="txt-desc">
                            <p>
                                <?php echo nl2br($show->sobre)?>
                            </p>
                            <!--<div class="redesS">
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                                <a href="#" class="fa fa-facebook"></a>
                                <a href="#" class="fa fa-twitter"></a>
                            </div>-->
                            <!--<div class="redesS">
                                <img style="width: 50%;" src="img/img_site/favicon.png" alt="logo">
                            </div>-->
                        </div>
                        <div class="line-desc">
                        <span>Serviços</span>
                        <div class="line"></div>
                        <a href="index.php?acao=servicos">ver mais +</a>
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
    
    
    <div class="box-services" id="serviços">
        <div class="serv-links">
        <?php

        include_once("banco/conect.php");
        $select = "SELECT * FROM servicos ORDER BY id_serv ASC LIMIT 6";
            try {
                $result = $conect->prepare($select);
                $cont = 1;
                $result->execute();
                $contar = $result->rowCount();
                if ($contar > 0) {
                    while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
                        ?>
            <div class="box-serv">
                <a href="index.php?acao=servicosPrev&id=<?php echo $show->id_serv?>" class="serv">
                    <img src="img/servicos/<?php echo $show->img_serv?>" alt="<?php echo $show->img_serv?>">
                </a>
                <span class="aniInfos">
                    <?php echo $show->nome_serv?>
                </span>
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
    </div>
</div>