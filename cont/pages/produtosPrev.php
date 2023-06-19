<div class="rowPrev">
<?php
    include('banco/conect.php');

    $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
    $select = "SELECT * FROM  loja WHERE id_prod=:id ";

    try {
        $resultado = $conect->prepare($select);
        $resultado->bindParam(':id', $id, PDO::PARAM_INT);
        $resultado->execute();

        $contar = $resultado->rowCount();
        if ($contar > 0) {
            while ($show = $resultado->FETCH(PDO::FETCH_OBJ)) {
                $idConts = $show->id_prod;
                $nome = $show->nome_prod;
                $valor = $show->valor_prod;
                $valorAnt = $show->valorAnt_prod;
                $desc = $show->desc_prod;
                $img = $show->art_prod;
            }
        } else {
            echo "não encontramos nada no nosso banco de dados";
        }
    } catch (PDOException $e) {
        echo "<strong>ERRO DE SELECT NO PDO = </strong>" . $e->getMessage();
    }
    ?>
    <div class="imgServPrev">
        <img src="img/produtos/<?php echo $img;?>" alt="<?php echo $img;?>">
        <div class="textprevimg">
        <h1 class="h1Previmg"><?php echo $nome;?></h1>
        <span id="cont-span">R$: <?php echo $valor;?></span>
        <a id="contrato" href="index.php?acao=contratar">Contratar</a>
        </div>
        
    </div>
    <div class="textServPrev">
        <h1 class="h1Prev"><?php echo $nome;?></h1>
        <span id="cont-span">R$: <?php echo $valor;?></span>
        <a id="contrato" href="index.php?acao=contratar">Contratar</a>
        <p class="txtPrev">
            <?php echo nl2br($desc);?>
        </p>
    </div>
</div>
<div class="row-comand">
    <div class="comand">
        <?php if($idConts == 1){?>
            <?php echo'<a href="#';?><?php echo'" class="prev" title="ver próximo serviço"><</a>';?>;
        <?php }else{?> 
            <?php echo'<a href="index.php?acao=ProdutosPrev&id=';?> <?php echo $idConts -1;?><?php echo'" class="prev" title="ver próximo serviço"><</a>';?>;
            <?php }?>

            <?php if($idConts == 78){?>
            <?php echo'<a href="#';?><?php echo'" class="next" title="ver próximo serviço">></a>';?>;
        <?php }else{?> 
            <?php echo'<a href="index.php?acao=ProdutosPrev&id=';?> <?php echo $idConts +1;?><?php echo'" class="next" title="ver próximo serviço">></a>';?>;
            <?php }?>
    </div>
</div>
<style>
    .rowPrev {
        position: relative;
        width: 100%;
        min-height: 500px;
        display: flex;
        justify-content: center;
    }
</style>