<?php
require "../lib/autoload.php";
date_default_timezone_set('America/Sao_Paulo');
if(!isset($_SESSION)){
    session_start();
}    

    $smarty = new Template();
   
    $smarty->display('cadastro-produto.tpl');




?>