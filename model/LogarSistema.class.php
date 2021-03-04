<?php

class LogarSistema extends Conexao{
    
    function __construct(){
        parent::__construct();
    }

    function LogarSistema($user, $password){
        $query = "SELECT * FROM usuario WHERE nome = :user AND senha = :pass AND cancelado = false AND ativo = true";
        $params = array(
            ':user' => $user,
            ':pass' => Sistema::Criptografia($password)
        );

        $this->ExecuteSQL($query,$params);

        if($this->TotalDados() > 0 ){

            $lista =  $this->ListarDados();
            $_SESSION['ATACADOV']['nomeUser'] = $lista['nome'];
            $_SESSION['ATACADOV']['user_ID'] = $lista['id_Usuario'];
            $_SESSION['ATACADOV']['nivelAcessoSistema'] = $lista['nivelAcesso'];
            $_SESSION['ATACADOV']['empresa'] = "Atacado do Body";
            return true;
    
        }else{
            session_destroy();
            $this->Dialog("Usuário invalido!", "falha");       
        }
    }
}
?>

