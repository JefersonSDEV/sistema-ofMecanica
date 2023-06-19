<?php

include_once("banco/conect.php");
if (isset($_GET['idDel'])) {
    $id = $_GET['idDel'];
    //selecionar a imagem
    $select = "SELECT * FROM loja WHERE id_prod=:id";

    try {
        $result = $conect->prepare($select);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();

        $contar = $result->rowCount();
        if ($contar > 0) {
            $loop = $result->fetchAll();
            ;
            foreach ($loop as $exibir) {
            }
            //Procurar e deletar a imagem
            $fotoDeleta = $exibir['art_prod'];
            $arquivo = "img/produtos/" . $fotoDeleta;
            unlink($arquivo);

            $delete = "DELETE FROM loja WHERE id_prod=:id";
            try {
                $result = $conect->prepare($delete);
                $result->bindParam(':id', $id, PDO::PARAM_INT);
                $result->execute();

                $contar = $result->rowCount();
                if ($contar > 0) {
                    //selecionar a imagem a ser deletada
                    header("Location: index.php?acao=adm");
                } else {
                    header("Location: index.php?acao=adm");
                }
            } catch (PDOException $e) {
                echo '<strong>ERRO DE DELETE = </strong>' . $e->getMessage();
            }
        } else {
            header('Location: index.php');
        }
    } catch (PDOException $e) {
        echo '<strong>ERRO DE CADASTRO = </strong>' . $e->getMessage();
    }
}


if (isset($_GET['idfaq'])) {
    $id = $_GET['idfaq'];

    $delete = "DELETE FROM faq WHERE id_faq=:id";
    try {
        $result = $conect->prepare($delete);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();

        $contar = $result->rowCount();
        if ($contar > 0) {
            //selecionar a imagem a ser deletada
            header("Location: index.php?acao=faq");
        } else {
            header("Location: index.php?acao=faq");
        }
    } catch (PDOException $e) {
        echo '<strong>ERRO DE DELETE = </strong>' . $e->getMessage();
    }
} else {
    header('Location: index.php');
}