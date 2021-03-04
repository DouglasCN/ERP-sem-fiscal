<?php  
date_default_timezone_set('America/Sao_Paulo');
//para iniciar a sessão
if(!isset($_SESSION)){
    session_start();
} 

require "./lib/autoload.php";
if(isset($_SESSION['ATACADOV']['nomeUser']) && isset( $_SESSION['ATACADOV']['user_ID']) && isset($_SESSION['ATACADOV']['nivelAcessoSistema'])){
    Rotas::Redirecionar(0, Rotas::pag_Home());
}else {

$smarty = new Template();
$smarty->assign('ROTA_TEMA', Rotas::get_SiteTEMA());

if(isset($_POST['user'])){
    $logarSistema = new LogarSistema();
    
    if($logarSistema->LogarSistema($_POST['user'],$_POST['pass'])){
        Rotas::Redirecionar(0, Rotas::pag_Home());
    }
}

$smarty->display('index.tpl'); 
}
?>