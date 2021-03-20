<?php
require "../../../lib/autoload.php";
if(!isset($_SESSION)){
    session_start();
} 
    header('Content-type: application/json');
    $Funcionario = new Funcionario();
    $Funcionario->getListaFuncionarioCodigoAPI($_GET['codigoUnico']);  
    

?>