<?php
require "../../lib/autoload.php";
if(!isset($_SESSION)){
    session_start();
} 
    header('Content-type: application/json');
    $PesquisaModulo = new PesquisaModulo();
    $PesquisaModulo->PesquisaModulos($_GET['nome']);  
    

?>