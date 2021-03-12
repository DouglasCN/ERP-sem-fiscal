<?php
require "../lib/autoload.php";
date_default_timezone_set('America/Sao_Paulo');
if(!isset($_SESSION)){
    session_start();
}    

    $smarty = new Template();
    
    if(isset($_POST['Nome'])){
        $nome = $_POST['Nome']; 
        $email = $_POST['Email']; 
        $CPF = $_POST['CPF']; 
        $contato1 = $_POST['contato1']; 
        $contato2 = $_POST['contato2']; 
        $dataAniversario = $_POST['dataAnivrsario']; 
        $salario = $_POST['salario']; 

        if("radioS" == $_POST['radio1']){
            
            $uerSistema = 1; 
            $usuario = $_POST['usuario']; 
            $Senha = $_POST['Senha']; 
            $nivelAcesso = $_POST['nivelAcesso']; 
        }else {
            $uerSistema = 0; 
            $usuario = ""; 
            $Senha = ""; 
            $nivelAcesso = ""; 
        }

        $tipoCliente = isset($_POST['tipoCliente']) ? 1 : 0; 
        $tipoFornecedor =  isset($_POST['tipoFornecedor']) ? 1 : 0; 
        $tipoFuncionario = true; 
        $cep = $_POST['cep']; 
        $estado = $_POST['estado']; 
        $cidade = $_POST['cidade']; 
        $bairro = $_POST['bairro']; 
        $logradouro = $_POST['logradouro']; 
        $complemento = $_POST['complemento']; 
        $numero = $_POST['numero'];
        $observacao = $_POST['observacao'];

    
    }



    $smarty->assign('ROTA_TEMA', Rotas::get_SiteTEMA());
    $smarty->assign('reverse', "{reverse: true}");
    
    $smarty->display('funcionarios.tpl');




?>