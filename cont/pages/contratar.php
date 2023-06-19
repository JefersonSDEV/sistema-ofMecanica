<div class="rowPrevs" style="align-items:center; padding: 20px;">
    <form id="formulario" action="" method="post" enctype="multipart/form-data">
        <input class="input" type="text" name="nome" placeholder="Nome Completo..." style="display: block;">
        <input class="input" type="text" name="fone" id="fone" placeholder="Telefone ex: (xx)x xxxx-xxxx" maxlength="16" style="display: block;">
        <input class="input" type="email" name="email" id="email" placeholder="Email..." style="display: block;">
        <input class="input" type="text" name="nomeService" placeholder="Nome do Serviço..." style="display: block;">
        <input class="input" type="datetime-local" name="horario" id="data" style="display: block;">
        <input id="rua" class="input" type="text" name="rua" placeholder="Nome da Rua...">
        <p id="forma-pag" onclick="forma()">
            forma de pagamento
        </p>
        <div class="forma-pagamento">
            <div class="pag-table" onclick="clickpix()">pix</div>
            <div class="pag-table" onclick="clickt()">crédito</div>
            <div class="pag-table" onclick="clickt()">débito</div>
            <div class="pag-table" onclick="clickt()">boleto</div>
            <div class="pag-table" onclick="clickt()">cancelar</div>
        </div>
        <div id="area-pix" onclick="clickqr()">
            <div class="img-qr">
                <img src="img/produtos/qr.png" alt="">
            </div>
        </div>
        <button class="contrate"  id="submit" type="submit">contratar</button>
    </form>
</div>