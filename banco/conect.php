<?php

  try {
    //códigos de execução
    DEFINE('HOST','localhost');
    DEFINE('BD','ofiMec');
    DEFINE('USER','root');
    DEFINE('PASS','bdjmf');

    $conect = new PDO('mysql:host='.HOST.';dbname='.BD,USER,PASS);
    $conect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo '<strong>ERRO DE PDO = </strong>'.$e->getMessage();
}
  