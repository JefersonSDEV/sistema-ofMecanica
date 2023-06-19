<div class="faq">
    <div class="quests">
        <h3>Faq Dúvidas mais frequentes</h3>
        <?php
        include_once("banco/conect.php");
        $select = "SELECT * FROM faq ORDER BY id_faq ASC LIMIT 30";
        try {
            $result = $conect->prepare($select);
            $cont = 1;
            $result->execute();
            $contar = $result->rowCount();
            if ($contar > 0) {
                while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
                    ?>
                    <div class="faq-q">
                        <span onclick="<?php echo $show->class_faq ?>()"><?php echo $show->nome_faq ?></span>
                        <?php
                        if ($email_user == "admin@ofice") { ?>
                            <a href="delete.php?idfaq= <?php echo $show->id_faq; ?>" onclick="return confirm('Deseja remover o item?')" class="exclude-faq">-</a>
                            <?php
                        } else { ?>
                        <?php } ?>

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

    <div class="resp">
        <?php
        include_once("banco/conect.php");
        $select = "SELECT * FROM faq ORDER BY id_faq ASC LIMIT 30";
        try {
            $result = $conect->prepare($select);
            $cont = 1;
            $result->execute();
            $contar = $result->rowCount();
            if ($contar > 0) {
                while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
                    ?>
                    <div id="<?php echo $show->class_faq ?>">
                        <span>
                            <?php echo $show->nome_faq ?>
                        </span>
                        <p>
                            <?php echo nl2br($show->resp_faq) ?>
                        </p>
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
<div class="faq-area">
    <h3>Faq, crie perguntas desenvolva soluções</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="dvd" placeholder="qual a dúvida?">
        <?php
        include_once("banco/conect.php");
        $select = "SELECT * FROM faq ORDER BY id_faq DESC LIMIT 1";
        try {
            $result = $conect->prepare($select);
            $cont = 1;
            $result->execute();
            $contar = $result->rowCount();
            if ($contar > 0) {
                while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
                    ?>
                    <input style="display: none;" name="cls" type="text" value="quest<?php echo $show->nb_class + 1 ?>">
                    <input style="display: none;" name="nb" type="text" value="<?php echo $show->nb_class + 1 ?>">
                    <?php
                }
            } else {
            }
        } catch (PDOException $e) {
            echo "<strong>ERRO DE PDO = </strong>" . $e->getMessage();
        }
        ?>
        <textarea name="resposta" id="" cols="30" rows="7" placeholder="resposta ou solução"></textarea>
        <button type="submit" name="enviar">enviar</button>
    </form>
    <?php
    if (isset($_POST['enviar'])) {
        $dvd = $_POST['dvd'];
        $cls = $_POST['cls'];
        $nb = $_POST['nb'];
        $resposta = $_POST['resposta'];

        $inserir = "INSERT INTO faq (nome_faq,class_faq,nb_class,resp_faq) VALUES (:dvd,:cls,:nb,:resposta)";
        try {
            $result = $conect->prepare($inserir);
            $result->bindParam(':dvd', $dvd, PDO::PARAM_STR);
            $result->bindParam(':cls', $cls, PDO::PARAM_STR);
            $result->bindParam(':nb', $nb, PDO::PARAM_STR);
            $result->bindParam(':resposta', $resposta, PDO::PARAM_STR);
            $result->execute();
            $contar = $result->rowCount();
            if ($contar > 0) {
                echo 'produto inserido com Sucesso :)';
                header("Refresh: 2, index.php?acao=faq");
            } else {
                echo 'Dados não inseridos :(';
                header("Refresh");
            }
        } catch (PDOException $e) {
            echo "<strong>ERRO DE UPLOAD = </strong>" . $e->getMessage();
        }
    }
    ?>
</div>
<?php
if ($email_user == "admin@ofice") { ?>
    <a id="faq">+</a>
    <?php
} else { ?>
<?php } ?>
<style>
    .faq {
        width: 100%;
        display: flex;
        padding: 20px;
    }

    .quests {
        width: 40%;
        min-height: 500px;
        max-height: 700px;
        margin-right: 5px;
        display: flex;
        align-items: center;
        color: #fff;
        flex-direction: column;
        padding: 10px;
        background: #222;
    }

    .resp {
        width: 60%;
        min-height: 500px;
        margin-left: 5px;
        display: flex;
        align-items: center;
        color: #fff;
        flex-direction: column;
        padding: 10px;
        background: #222;
    }

    .faq-q {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid #ccc;
    }

    .faq-q span {
        width: 100%;
        padding: 5px;
        cursor: pointer;
    }

    .exclude-faq {
        cursor: pointer;
        background: red;
        color: #fff;
        width: 20px;
        height: 20px;
        margin-right: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-size: 30px;
        font-weight: 700;
    }

    .resp div {
        width: 100%;
        display: none;
        text-align: justify;
        padding: 5px 0;
        border-bottom: 1px solid #ccc;
    }

    .faq span {
        width: 100%;
        font-size: 15px;
        text-transform: uppercase;
    }

    .faq p {
        color: #ccccccdd;
        font-style: italic;
    }

    .faq h3,
    .faq-area h3 {
        color: #fff;
        font-weight: 300;
        position: relative;
        margin-bottom: 30px;
        text-align: center;
        text-transform: uppercase;
    }

    .faq h3::after,
    .faq-area h3::after {
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

    .faq-area {
        position: fixed;
        width: 100%;
        height: 100%;
        background: #000000d0;
        display: none;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .faq-area form {
        width: 40%;
        display: flex;
        justify-content: center;
        flex-direction: column;
        padding: 20px;
    }

    .faq-area form input,
    .faq-area form textarea {
        width: 100%;
        padding: 5px;
        padding-left: 10px;
        background: transparent;
        border: none;
        border: 1px solid #ff0000;
        border-radius: 5px;
        margin: 10px 0;
        color: #ff0000;
    }

    .faq-area form button {
        width: 100px;
        padding: 10px;
        text-transform: uppercase;
        font-weight: 700;
        background: transparent;
        border: none;
        border: 1px solid #ff0000;
        border-radius: 5px;
        margin: 10px 0;
        color: #ff0000;
    }

    .faq-area form button:hover {
        background: #ff0000;
        border: 1px solid #fff;
        color: #fff;
    }

    #faq {
        position: fixed;
        bottom: 20px;
        left: 20px;
        width: 30px;
        height: 30px;
        border-radius: 100%;
        background: red;
        border: 1px solid #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        z-index: 50;
        text-decoration: none;
        font-weight: 700;
        cursor: pointer;
    }

    #faq:hover {
        background: #fff;
        color: red;
        border: 1px solid red;
    }
</style>
<script>
    var ques1 = document.querySelector("#quest1");
    var ques2 = document.querySelector("#quest2");
    var ques3 = document.querySelector("#quest3");
    var ques4 = document.querySelector("#quest4");
    var ques5 = document.querySelector("#quest5");
    var ques6 = document.querySelector("#quest6");
    var ques7 = document.querySelector("#quest7");
    var ques8 = document.querySelector("#quest8");
    var ques9 = document.querySelector("#quest9");
    var ques10 = document.querySelector("#quest10");
    var ques11 = document.querySelector("#quest11");
    var ques12 = document.querySelector("#quest12");
    var ques13 = document.querySelector("#quest13");

    function quest1() {
        if (ques1.style.display == "none") {
            ques1.style.display = "block";
        } else {
            ques1.style.display = "none";
        }
    }

    function quest2() {
        if (ques2.style.display == "none") {
            ques2.style.display = "block";
        } else {
            ques2.style.display = "none";
        }
    }

    function quest3() {
        if (ques3.style.display == "none") {
            ques3.style.display = "block";
        } else {
            ques3.style.display = "none";
        }
    }

    function quest4() {
        if (ques4.style.display == "none") {
            ques4.style.display = "block";
        } else {
            ques4.style.display = "none";
        }
    }

    function quest5() {
        if (ques5.style.display == "none") {
            ques5.style.display = "block";
        } else {
            ques5.style.display = "none";
        }
    }

    function quest6() {
        if (ques6.style.display == "none") {
            ques6.style.display = "block";
        } else {
            ques6.style.display = "none";
        }
    }

    function quest7() {
        if (ques7.style.display == "none") {
            ques7.style.display = "block";
        } else {
            ques7.style.display = "none";
        }
    }

    function quest8() {
        if (ques8.style.display == "none") {
            ques8.style.display = "block";
        } else {
            ques8.style.display = "none";
        }
    }

    function quest9() {
        if (ques9.style.display == "none") {
            ques9.style.display = "block";
        } else {
            ques9.style.display = "none";
        }
    }

    function quest10() {
        if (ques10.style.display == "none") {
            ques10.style.display = "block";
        } else {
            ques10.style.display = "none";
        }
    }

    function quest11() {
        if (ques11.style.display == "none") {
            ques11.style.display = "block";
        } else {
            ques11.style.display = "none";
        }
    }

    function quest12() {
        if (ques12.style.display == "none") {
            ques12.style.display = "block";
        } else {
            ques12.style.display = "none";
        }
    }

    function quest13() {
        if (ques13.style.display == "none") {
            ques13.style.display = "block";
        } else {
            ques13.style.display = "none";
        }
    }
    var faq = document.getElementById("faq");
    var faqArea = document.querySelector(".faq-area");
    faq.addEventListener("click", function () {
        if (faqArea.style.display == "none") {
            faqArea.style.display = "flex";
        } else {
            faqArea.style.display = "none";
        }
    });
</script>