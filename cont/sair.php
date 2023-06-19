<?php

if(isset($_REQUEST['sair'])){
    session_destroy();
    header("Location: cont/login.php?acao=sair");
}