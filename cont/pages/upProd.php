<div class="contato">
    <div class="form-contact">
        <h2>Cadastre produtos</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="nome" style="display: block;" id="" placeholder="nome do produto...">
            <input type="text" name="valor" style="display: block;" id="" placeholder="digite um valor ex: 100,00...">
            <input type="file" name="art" id="art">
            <textarea name="desc" id="" cols="30" rows="7" placeholder="descreva o produto..."></textarea>
            <div class="btn-contact">
                <label for="art">enviar art</label>
                <button name="enviar" type="submit">publicar</button>
            </div>
        </form>
        <?php
        include('banco/conect.php');
        if (isset($_POST['enviar'])) {
            $nome = $_POST['nome'];
            $formatP = array("png", "jpg", "JPG", "gif", "webp");
            $extensao = pathinfo($_FILES['art']['name'], PATHINFO_EXTENSION);
            $valor = $_POST['valor'];
            $desc = $_POST['desc'];

            if (in_array($extensao, $formatP)) {
                $pasta = "img/produtos/";
                $temporario = $_FILES['art']['tmp_name'];
                $novoNome = uniqid() . ".$extensao";

                if (move_uploaded_file($temporario, $pasta . $novoNome)) {
                    $inserir = "INSERT INTO loja (nome_prod,desc_prod,valor_prod,art_prod) VALUES (:nome,:descr,:valor,:art)";
                    try {
                        $result = $conect->prepare($inserir);
                        $result->bindParam(':nome', $nome, PDO::PARAM_STR);
                        $result->bindParam(':descr', $desc, PDO::PARAM_STR);
                        $result->bindParam(':valor', $valor, PDO::PARAM_STR);
                        $result->bindParam(':art', $novoNome, PDO::PARAM_STR);
                        $result->execute();
                        $contar = $result->rowCount();
                        if ($contar > 0) {
                            echo 'produto inserido com Sucesso :)';
                            header("Refresh: 2, index.php?acao=upProd");
                        } else {
                            echo 'Dados não inseridos :(';
                            header("Refresh");
                        }
                    } catch (PDOException $e) {
                        echo "<strong>ERRO DE UPLOAD = </strong>" . $e->getMessage();
                    }
                } else {
                    echo "Erro não foi possível fazer upload do produto!";
                }

            } else {
                echo "formato inválido";
            }

        }
        ?>
    </div>
</div>