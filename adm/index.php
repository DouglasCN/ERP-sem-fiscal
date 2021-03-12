<?php
require "../lib/autoload.php";
date_default_timezone_set('America/Sao_Paulo');
if(!isset($_SESSION)){
    session_start();
}    

    $smarty = new Template();

  
    $smarty->assign('ROTA_TEMA', Rotas::get_SiteTEMA());
    $smarty->assign('PAG_FUNCIONARIOS', Rotas::pag_Funcionarios());
    $smarty->assign('ROTA_PAGINAS', Rotas::get_SiteADM());
   
    
    $smarty->display('index.tpl');




?>