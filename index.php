<?php
include_once('cont/header.php');
if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
    if ($acao == 'home') {
        include_once('cont/pages/home.php');
    }elseif ($acao == 'servicos') {
        include_once('cont/pages/servicos.php');
    }elseif ($acao == 'loja') {
        include_once('cont/pages/loja.php');
    }elseif ($acao == 'contato') {
        include_once('cont/pages/contato.php');
    }elseif ($acao == 'faq') {
        include_once('cont/pages/faq.php');
    }elseif ($acao == 'vaga') {
        include_once('cont/pages/curriculo.php');
    }elseif ($acao == 'contratar') {
        include_once('cont/pages/contratar.php');
    }elseif ($acao == 'servicosPrev') {
        include_once('cont/pages/servicosPrev.php');
    }elseif ($acao == 'ProdutosPrev') {
        include_once('cont/pages/produtos.php');
    }elseif ($acao == 'compProduto') {
        include_once('cont/pages/compProduto.php');
    }elseif ($acao == 'upProd') {
        include_once('cont/pages/upProd.php');
    }elseif ($acao == 'upServ') {
        include_once('cont/pages/upServ.php');
    }elseif ($acao == 'login') {
        include_once('cont/pages/login.php');
    }elseif($acao == 'tbProd'){
        include_once("cont/pages/tabelaProd.php");
    }elseif($acao == 'upP'){
        include_once("cont/edits/edit-produtos.php");
    }elseif($acao == 'upS'){
        include_once("cont/edits/edit-services.php");
    }elseif($acao == 'adm'){
        include_once("adm.php");
    }else {
        include_once("cont/erro.php");
    }
} else {
    include_once('cont/pages/home.php');
}
include_once('cont/footer.php');