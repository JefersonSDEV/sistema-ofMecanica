<div class="tabela">
    <ul>
        <?php

        include_once("banco/conect.php");
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
                            <a href="index.php?acao=editar&idUp= <?php echo $show->id_serv;?>" id="btn_tbEd">editar</a>
                            <a href="delete.php?idDel= <?php echo $show->id_prod; ?>" onclick="return confirm('Deseja remover o produto')" id="btn_tbEx">excluir</a>
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