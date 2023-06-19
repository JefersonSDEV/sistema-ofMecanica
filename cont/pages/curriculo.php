<div class="contato">
    <div class="form-contact">
    <div class="curriculo">
        <h3>faça já sua inscrição</h3>
    </div>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="nome" id="nome" placeholder="Digite seu Nome Completo...">
            <!--<span role="alert" id="nameError1" aria-hidden="true">
                Este campo é obrigatório*
            </span>-->

            <input type="email" name="email" id="email" placeholder="Digite seu Email...">
            <!--<span role="alert" id="nameError2" aria-hidden="true">
                Este campo é obrigatório*
            </span>-->

            <input type="text" name="end" id="end" placeholder="Digite seu Endereço...">
            <!--<span role="alert" id="nameError3" aria-hidden="true">
                Este campo é obrigatório*
            </span>-->

            <input type="text" name="fone" id="fone" placeholder="Digite seu Número de Contato...">
            <!--<span role="alert" id="nameError4" aria-hidden="true">
                Este campo é obrigatório*
            </span>-->

            <input type="file" name="pdf" id="pdf" style="display:none;" accept="application/pdf">
            <div class="btn-contact">
                <label for="pdf">(PDF)</label>
                <!--<span role="alert" id="nameError5" aria-hidden="true">
                    O arquivo é obrigatório*
                </span>-->
                <button name="submit" id="submit"  type="submit" style="padding: 5px;">Enviar</button>
            </div>
        </form>
        
        <?php
        include_once("banco/conect.php");
        if(isset($_POST['submit'])){
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $end = $_POST['end'];
            $fone = $_POST['fone'];
            $formatP = array("png", "jpg", "JPG", "gif", "webp", "pdf", "PDF");
            $extensao = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);

            if (in_array($extensao, $formatP)) {
                $pasta = "img/curriculo/";
                $temporario = $_FILES['pdf']['tmp_name'];
                $novoNome = uniqid() . ".$extensao";

                if (move_uploaded_file($temporario, $pasta . $novoNome)) {
                    $inserir = "INSERT INTO vaga (nome,email,ende,fone,pdf) VALUES (:nome,:email,:ende,:fone,:pdf)";
                    try {
                        $result = $conect->prepare($inserir);
                        $result->bindParam(':nome', $nome, PDO::PARAM_STR);
                        $result->bindParam(':email', $email, PDO::PARAM_STR);
                        $result->bindParam(':ende', $end, PDO::PARAM_STR);
                        $result->bindParam(':fone', $fone, PDO::PARAM_STR);
                        $result->bindParam(':pdf', $novoNome, PDO::PARAM_STR);
                        $result->execute();
                        $contar = $result->rowCount();
                        if ($contar > 0) {
                            echo '<div class="msgform">Currículo inserido com Sucesso :)</div>';
                        } else {
                            echo '<div class="msgform">currículo não inserido :(</div>';
                            header("Refresh");
                        }
                    } catch (PDOException $e) {
                        echo '<div class="msgform"><strong>ERRO DE UPLOAD = </strong></div>' . $e->getMessage();
                    }
                } else {
                    echo '<div class="msgform">Erro não foi possível fazer upload do Currículo!</div>';
                }

            } else {
                echo '<div class="msgform">formato inválido</div>';
            }
        }
        ?>
    </div>
</div>