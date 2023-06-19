<style>

    body>ul {
        position: absolute;
        top: 50%;
        width: 800px;
        height: 200px;
        left: 50%;
        margin-left: -400px;
        margin-top: -130px;
    }

    ul>li {
        width: 25%;
        list-style-type: none;
        position: absolute;
        top: 0;
        padding: 20px;
        height: 200px;
        opacity: 0;
        padding-top: 40px;
        text-align: center;
        transition: 1s opacity;
    }

    .active {
        opacity: 1;
    }

    p {
        font-family: sans-serif;
        font-size: 13px;
        color: #646566;
        line-height: 1.5em;
    }

    strong {
        color: #fff;
        font-weight: 700;
        font-size: 60px;
        line-height: 100px;
    }
</style>
<script>
    var timer = 4000;

var i = 0;
var max = $('#c > li').length;
 
	$("#c > li").eq(i).addClass('active').css('left','0');
	$("#c > li").eq(i + 1).addClass('active').css('left','8%');
	$("#c > li").eq(i + 2).addClass('active').css('left','16%');
	$("#c > li").eq(i + 3).addClass('active').css('left','24%');
    $("#c > li").eq(i + 4).addClass('active').css('left','32%');
	$("#c > li").eq(i + 5).addClass('active').css('left','40%');
	$("#c > li").eq(i + 6).addClass('active').css('left','48%');
	$("#c > li").eq(i + 7).addClass('active').css('left','56%');
    $("#c > li").eq(i + 4).addClass('active').css('left','64%');
	$("#c > li").eq(i + 5).addClass('active').css('left','72%');
	$("#c > li").eq(i + 6).addClass('active').css('left','80%');
	$("#c > li").eq(i + 7).addClass('active').css('left','88%');
 

	setInterval(function(){ 

		$("#c > li").removeClass('active');

		$("#c > li").eq(i).css('transition-delay','0.25s');
		$("#c > li").eq(i + 1).css('transition-delay','0.5s');
		$("#c > li").eq(i + 2).css('transition-delay','0.75s');
		$("#c > li").eq(i + 3).css('transition-delay','1s');
		$("#c > li").eq(i + 4).css('transition-delay','1.25s');
		$("#c > li").eq(i + 5).css('transition-delay','1.5s');
		$("#c > li").eq(i + 6).css('transition-delay','1.75s');
		$("#c > li").eq(i + 7).css('transition-delay','2s');
		$("#c > li").eq(i + 8).css('transition-delay','2.25s');
		$("#c > li").eq(i + 9).css('transition-delay','2.5s');
		$("#c > li").eq(i + 10).css('transition-delay','2.75s');
		$("#c > li").eq(i + 11).css('transition-delay','3s');

		if (i < max +12) {
			i = i+12; 
		}

		else { 
			i = 0; 
		}  

		$("#c > li").eq(i).css('left','0').addClass('active').css('transition-delay','1.25s');
		$("#c > li").eq(i + 1).css('left','8%').addClass('active').css('transition-delay','1.5s');
		$("#c > li").eq(i + 2).css('left','16%').addClass('active').css('transition-delay','1.75s');
		$("#c > li").eq(i + 3).css('left','24%').addClass('active').css('transition-delay','2s');
		$("#c > li").eq(i + 4).css('left','32%').addClass('active').css('transition-delay','2.25s');
		$("#c > li").eq(i + 5).css('left','40%').addClass('active').css('transition-delay','2.5s');
		$("#c > li").eq(i + 6).css('left','48%').addClass('active').css('transition-delay','2.75s');
		$("#c > li").eq(i + 7).css('left','56%').addClass('active').css('transition-delay','3s');
		$("#c > li").eq(i + 8).css('left','64%').addClass('active').css('transition-delay','3.25s');
		$("#c > li").eq(i + 9).css('left','72%').addClass('active').css('transition-delay','3.5s');
		$("#c > li").eq(i + 10).css('left','80%').addClass('active').css('transition-delay','3.75s');
		$("#c > li").eq(i + 11).css('left','88%').addClass('active').css('transition-delay','4s');
	
	
	}, timer);
 
</script>
<ul id="c">

    <li>
        <p><strong>1</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>
    <li>
        <p><strong>2</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>
    <li>
        <p><strong>3</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>
    <li>
        <p><strong>4</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>

    <li>
        <p><strong>5</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>
    <li>
        <p><strong>6</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>
    <li>
        <p><strong>7</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>
    <li>
        <p><strong>8</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>

    <li>
        <p><strong>9</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>
    <li>
        <p><strong>10</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>
    <li>
        <p><strong>11</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>
    <li>
        <p><strong>12</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>
    <li>
        <p><strong>13</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>
    <li>
        <p><strong>14</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>
    <li>
        <p><strong>15</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>
    <li>
        <p><strong>16</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>

    <li>
        <p><strong>17</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>
    <li>
        <p><strong>18</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>
    <li>
        <p><strong>19</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>
    <li>
        <p><strong>20</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>

    <li>
        <p><strong>21</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>
    <li>
        <p><strong>22</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>
    <li>
        <p><strong>23</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>
    <li>
        <p><strong>24</strong></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </li>


</ul>
<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdpn.io/cpe/boomboom/pen.js?key=pen.js-bc5da96a-d465-073a-6971-8a1deab6b02b" crossorigin=""></script>

<div class="slider js-slider">
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
                    <div class="card">
                        <div class="like"></div>
                        <img class="product" src="img/produtos/<?php echo $show->art_prod ?>"
                            alt="Foto do produtos - <?php echo $show->art_prod ?>" />
                        <h4 class="title" title="<?php echo $show->nome_prod ?>"><?php echo $show->nome_prod ?></h4>
                        <div class="price">
                            <?php
                            if ($show->valorAnt_prod == "") {
                                ?>
                                <?php
                            } else {
                                ?>
                                <h5>R$
                                    <?php echo " $show->valorAnt_prod"; ?>
                                </h5>
                                <?php
                            }
                            ?>
                            <h5>
                                R$
                                <?php echo $show->valor_prod ?>
                            </h5>
                        </div>
                        <a class="button" href="index.php?acao=ProdutosPrev&id=<?php echo $show->id_prod ?>">Visualizar</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"
        integrity="sha512-h9kKZlwV1xrIcr2LwAPZhjlkx+x62mNwuQK5PAu9d3D+JXMNlGx8akZbqpXvp0vA54rz+DrqYVrzUGDMhwKmwQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.2.1/jquery-migrate.min.js"
        integrity="sha512-fDGBclS3HUysEBIKooKWFDEWWORoA20n60OwY7OSYgxGEew9s7NgDaPkj7gqQcVXnASPvZAiFW8DiytstdlGtQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="style/scriptLoja.js"></script>
</div>