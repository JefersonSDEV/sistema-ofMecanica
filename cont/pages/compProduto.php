<div class="rowPrevs" style="align-items:center; padding: 20px;">
    <form id="formulario" action="" method="post" enctype="multipart/form-data">
        <input class="input" type="text" name="nome" placeholder="Nome Completo...">
        <input class="input" type="text" name="tel" id="tel" placeholder="Telefone ex: (xx)x xxxx-xxxx" maxlength="16">
        <input class="input" type="email" name="email" id="email" placeholder="Email...">
        <input class="input" type="text" name="nomeProduto" placeholder="Nome do Produto...">
        <div class="modo">
            <div class="modo-i">
                <label class="Elabel-box" for="entrega" onclick="entrega()">
                    <label for="" class="Elabel-box-c"></label>
                </label>
                <span>entrega</span>
            </div>

            <div class="modo-i">
                <label class="Plabel-box" for="pegar" onclick="pegar()">
                    <label for="" class="Plabel-box-c"></label>
                </label>
                <span>pegar na loja</span>
            </div>
        </div>
        <input id="rua" class="input" type="text" name="rua" placeholder="Nome da Rua...">
        <p id="forma-pag" onclick="forma()">
            forma de pagamento
        </p>
        <div class="forma-pagamento">
            <div class="pag-table" onclick="clickt()">pix</div>
            <div class="pag-table" onclick="clickt()">crédito</div>
            <div class="pag-table" onclick="clickt()">débito</div>
            <div class="pag-table" onclick="clickt()">boleto</div>
            <div class="pag-table" onclick="clickt()">cancelar</div>
        </div>
        
        <button id="contrate" type="submit">comprar</button>
    </form>
</div>