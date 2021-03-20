<?php

class Funcionario extends Conexao{
    private $Func_numeroUnico, $Func_razaoSocial, $Func_email, $Func_cpf, $Func_contato1, $Func_contato2, $Func_dataAniversario;
    private $Func_salario, $Func_userSistema, $Func_usuario, $Func_senha, $Func_nivelAcesso, $Func_parceiroCliente;
    private $Func_parceiroFornecedor, $Func_parceiroFuncionario, $Func_cep, $Func_estado, $Func_cidade, $Func_bairro; 
    private $Func_logradouro, $Func_complemento, $Func_numero, $Func_observacao, $Func_foto;

    function __construct(){
        parent::__construct();
    }

    function Preparar($Func_numeroUnico, $Func_razaoSocial, $Func_email, $Func_cpf, $Func_contato1, $Func_contato2,
     $Func_dataAniversario, $Func_salario, $Func_userSistema, $Func_usuario, $Func_senha, $Func_nivelAcesso, $Func_parceiroCliente,
     $Func_parceiroFornecedor, $Func_parceiroFuncionario, $Func_cep, $Func_estado, $Func_cidade, $Func_bairro, $Func_logradouro,
     $Func_complemento, $Func_numero, $Func_observacao, $Func_foto){

        $this->setFunc_numeroUnico($Func_numeroUnico);
        $this->setFunc_razaoSocial($Func_razaoSocial);
        $this->setFunc_email($Func_email);
        $this->setFunc_cpf($Func_cpf);
        $this->setFunc_contato1($Func_contato1);
        $this->setFunc_contato2($Func_contato2);
        $this->setFunc_dataAniversario($Func_dataAniversario);
        $this->setFunc_salario($Func_salario);
        $this->setFunc_userSistema($Func_userSistema);
        $this->setFunc_usuario($Func_usuario);
        $this->setFunc_senha($Func_senha);
        $this->setFunc_nivelAcesso($Func_nivelAcesso);
        $this->setFunc_parceiroCliente($Func_parceiroCliente);
        $this->setFunc_parceiroFornecedor($Func_parceiroFornecedor);
        $this->setFunc_parceiroFuncionario($Func_parceiroFuncionario);
        $this->setFunc_cep($Func_cep);
        $this->setFunc_estado($Func_estado);
        $this->setFunc_cidade($Func_cidade);
        $this->setFunc_bairro($Func_bairro);
        $this->setFunc_logradouro($Func_logradouro);
        $this->setFunc_complemento($Func_complemento);
        $this->setFunc_numero($Func_numero);
        $this->setFunc_observacao($Func_observacao);
        $this->setFunc_foto($Func_foto);
    }

    function Inserir(){
        
        $query = "INSERT INTO {$this->prefix}parceiro (razaoSocial, CPF_CNPJ, tipoPessoa, parceiroCliente, parceiroFornecedor, 
        parceiroFuncionario, cep, estado, cidade, bairro, endereco, complemento, numero, contato1, contato2, email, observacao, 
        dataAniversario, dataCadastro, excluido, quemCadastrou, quemAtualizou, ultimaAtualizacao, usuario, senha, salario, 
        foto, nivelAcesso, ativo) values ";
        $query .= "(:razaoSocial, :CPF_CNPJ, :tipoPessoa, :parceiroCliente, :parceiroFornecedor, :parceiroFuncionario, :cep, 
        :estado, :cidade, :bairro, :endereco, :complemento, :numero, :contato1, :contato2, :email, :observacao, :dataAniversario, 
        :dataCadastro, :excluido, :quemCadastrou, :quemAtualizou, :ultimaAtualizacao, :usuario, :senha, :salario, :foto, 
        :nivelAcesso, :ativo)";
        
        $params = array(
            ':razaoSocial' => $this->getFunc_razaoSocial(),
            ':CPF_CNPJ' => $this->getFunc_cpf(),
            ':tipoPessoa' => 1,
            ':parceiroCliente' => $this->getFunc_parceiroCliente(),
            ':parceiroFornecedor' => $this->getFunc_parceiroFornecedor(),
            ':parceiroFuncionario' => $this->getFunc_parceiroFuncionario(),
            ':cep' => $this->getFunc_cep(),
            ':estado' => $this->getFunc_estado(),
            ':cidade' => $this->getFunc_cidade(),
            ':bairro' => $this->getFunc_bairro(),
            ':endereco' => $this->getFunc_logradouro(),
            ':complemento' => $this-> getFunc_complemento(),
            ':numero' => $this->getFunc_numero(),
            ':contato1' => $this->getFunc_contato1(),
            ':contato2' => $this->getFunc_contato2(),
            ':email' => $this->getFunc_email(),
            ':observacao' => $this->getFunc_observacao(),
            ':dataAniversario' => $this->getFunc_dataAniversario(),
            ':dataCadastro' => date('Y-m-d'),
            ':excluido' => 0,
            ':quemCadastrou' => $_SESSION[''], 
            ':quemAtualizou' => $_SESSION[''],
            ':ultimaAtualizacao' => date('Y-m-d'),
            ':usuario' => $this->getFunc_usuario(),
            ':senha' => $this->getFunc_senha(),
            ':salario' => $this->getFunc_salario(),
            ':foto' => $this->getFunc_foto(),
            ':nivelAcesso' => $this->getFunc_nivelAcesso(),
            ':ativo' => $this->getFunc_userSistema()
        ); 
        if($this->ExecuteSQL($query, $params)){
            $this->Dialog("Cliente cadastrado(a) com sucesso!", "sucesso");
 
        }else {
            $this->Dialog("Houve um problema ao cadastrar o cliente, entre em contato com o desenvolvedor!", "falha");
        }
    }

    function Alterar(){
        
        $query = "UPDATE {$this->prefix}parceiro set razaoSocial = :razaoSocial,  CPF_CNPJ = :CPF_CNPJ,  parceiroCliente= :parceiroCliente,
         parceiroFornecedor = :parceiroFornecedor, cep = :cep, estado = :estado, cidade = :cidade, bairro= :bairro, endereco = :endereco, 
         complemento = :complemento, numero = :numero, contato1 = :contato1, contato2 = :contato2, email = :email, observacao = :observacao, 
         dataAniversario = :dataAniversario , quemAtualizou = :quemAtualizou, ultimaAtualizacao = :ultimaAtualizacao, salario = :salario 
         WHERE codigoUnico = :codigoUnico";
        
        $params = array(
            ':razaoSocial' => $this->getFunc_razaoSocial(),
            ':codigoUnico' => $this->getFunc_numeroUnico(),
            ':CPF_CNPJ' => $this->getFunc_cpf(),
            ':parceiroCliente' => $this->getFunc_parceiroCliente(),
            ':parceiroFornecedor' => $this->getFunc_parceiroFornecedor(),
            ':cep' => $this->getFunc_cep(),
            ':estado' => $this->getFunc_estado(),
            ':cidade' => $this->getFunc_cidade(),
            ':bairro' => $this->getFunc_bairro(),
            ':endereco' => $this->getFunc_logradouro(),
            ':complemento' => $this-> getFunc_complemento(),
            ':numero' => $this->getFunc_numero(),
            ':contato1' => $this->getFunc_contato1(),
            ':contato2' => $this->getFunc_contato2(),
            ':email' => $this->getFunc_email(),
            ':observacao' => $this->getFunc_observacao(),
            ':dataAniversario' => $this->getFunc_dataAniversario(),
            ':quemAtualizou' => $_SESSION[''],
            ':ultimaAtualizacao' => date('Y-m-d'),
            ':salario' => $this->getFunc_salario()
        ); 
        if($this->ExecuteSQL($query, $params)){
            $this->Dialog("Cliente alterado(a) com sucesso!", "sucesso");
 
        }else {
            $this->Dialog("Houve um problema ao cadastrar o cliente, entre em contato com o desenvolvedor!", "falha");
        }
    }
    
    function getListaFuncionarioAPI(){
        $query = "SELECT * FROM {$this->prefix}parceiro WHERE excluido = false ";
        
        $this->ExecuteSQL($query);

        $this->GetListaFuncionarioJSON();
    }

    function getListaFuncionarioCodigoAPI($id){
        $query = "SELECT * FROM {$this->prefix}parceiro WHERE excluido = false AND codigoUnico = :id";
        
        $params = array(
            ':id' => (int)$id 
        ); 

        $this->ExecuteSQL($query,$params);

        $this->GetListaFuncionarioCodigoUnicoJSON();
    }

    private function GetListaFuncionarioCodigoUnicoJSON(){
        
        if($this->TotalDados() > 0 ){

            $i = 1;
            while($lista = $this->ListarDados()):
                $produtos[$i] = [
                    'codigoUnico'=> $lista['codigoUnico'],
                    'razaoSocial'=> $lista['razaoSocial'],
                    'CPF_CNPJ'=> $lista['CPF_CNPJ'],
                    'parceiroCliente'=> $lista['parceiroCliente'],
                    'parceiroFornecedor'=> $lista['parceiroFornecedor'],
                    'parceiroFuncionario'=> $lista['parceiroFuncionario'],
                    'cep'=> $lista['cep'],
                    'estado'=> $lista['estado'],
                    'cidade'=> $lista['cidade'],
                    'bairro'=> $lista['bairro'],
                    'endereco'=> $lista['endereco'],
                    'complemento'=> $lista['complemento'],
                    'numero'=> $lista['numero'],
                    'contato1'=> $lista['contato1'],
                    'contato2'=> $lista['contato2'],
                    'email'=> $lista['email'],
                    'observacao'=> $lista['observacao'],
                    'usuario'=> $lista['usuario'],
                    'salario'=> $lista['salario'],
                    'foto'=> $lista['foto'],
                    'nivelAcesso'=> $lista['nivelAcesso'],
                    'dataAniversario'=> date("d/m/Y", strtotime($lista['dataAniversario']))
                ];
                $i++;
            endwhile;
            echo json_encode(array_values($produtos));
            
        }
    }

    private function GetListaFuncionarioJSON(){
        
        if($this->TotalDados() > 0 ){

            $i = 1;
            while($lista = $this->ListarDados()):
                $produtos[$i] = [
                    'codigoUnico'=> $lista['codigoUnico'],
                    'razaoSocial'=> $lista['razaoSocial'],
                    'CPF_CNPJ'=> $lista['CPF_CNPJ'],
                    'contato1'=> $lista['contato1'],
                    'contato2'=> $lista['contato2'],
                    'dataAniversario'=> date("d/m/Y", strtotime($lista['dataAniversario']))
                ];
                $i++;
            endwhile;
            echo json_encode(array_values($produtos));
            
        }
    }

    private function GetLista(){
        $i = 1;
        //eu estou chamando o meu metodo listar dados da classe conexão
        while($lista = $this->ListarDados()):
        $this->itens[$i] = array(
            'idCliente' =>$lista['id_Cliente'],
            'nomeFantasia' => $lista['nomeFantasia'],
            'razaoSocial' => $lista['razaoSocial'],
            'nomeResponsavel' => $lista['nomeResponsavel'],
            'inscricaoEstadual' => $lista['inscricaoEstadual'],
            'CNPJ' => $lista['CNPJ'],
            'email' => $lista['email'],
            'contato' => $lista['contato'],
            'logradouro' => $lista['logradouro'],
            'complemento' => $lista['complemento'],
            'numero' => $lista['numero'],
            'bairro' => $lista['bairro'],
            'cidade' => $lista['cidade'],
            'estado' => $lista['estado'],
            'cep' => $lista['cep'],
            'dataCadastro' => $lista['dataCadastro']
        );
        $i++;
        endwhile;
    }

    //metods get

    function getFunc_numeroUnico(){
        return $this->Func_numeroUnico;
    }

    function getFunc_razaoSocial(){
        return $this->Func_razaoSocial;
    }

    function getFunc_email(){
        return $this->Func_email;
    }

    function getFunc_cpf(){
        return $this->Func_cpf;
    }

    function getFunc_contato1(){
        return $this->Func_contato1;
    }

    function getFunc_contato2(){
        return $this->Func_contato2;
    }

    function getFunc_dataAniversario(){
        return $this->Func_dataAniversario;
    }

    function getFunc_salario(){
        return $this->Func_salario;
    }

    function getFunc_userSistema(){
        return $this->Func_userSistema;
    }

    function getFunc_usuario(){
        return $this->Func_usuario;
    }

    function getFunc_senha(){
        return $this->Func_senha;
    }

    function getFunc_nivelAcesso(){
        return $this->Func_nivelAcesso;
    }

    function getFunc_parceiroCliente(){
        return $this->Func_parceiroCliente;
    }

    function getFunc_parceiroFornecedor(){
        return $this->Func_parceiroFornecedor;
    }

    function getFunc_parceiroFuncionario(){
        return $this->Func_parceiroFuncionario;
    }

    function getFunc_cep(){
        return $this->Func_cep;
    }

    function getFunc_estado(){
        return $this->Func_estado;
    }

    function getFunc_cidade(){
        return $this->Func_cidade;
    }

    function getFunc_bairro(){
        return $this->Func_bairro;
    }

    function getFunc_logradouro(){
        return $this->Func_logradouro;
    }

    function getFunc_complemento(){
        return $this->Func_complemento;
    }

    function getFunc_numero(){
        return $this->Func_numero;
    }

    function getFunc_observacao(){
        return $this->Func_observacao;
    }

    function getFunc_foto(){
        return $this->Func_foto;
    }


    //metodos set

    function setFunc_numeroUnico($Func_numeroUnico){
        $this->Func_numeroUnico = $Func_numeroUnico;
    }

    function setFunc_razaoSocial($Func_razaoSocial){
        $this->Func_razaoSocial = $Func_razaoSocial;
    }

    function setFunc_email($Func_email){
        $this->Func_email = $Func_email;
    }

    function setFunc_cpf($Func_cpf){
        $this->Func_cpf = $Func_cpf;
    }

    function setFunc_contato1($Func_contato1){
        $this->Func_contato1 = $Func_contato1;
    }

    function setFunc_contato2($Func_contato2){
        $this->Func_contato2 = $Func_contato2;
    }

    function setFunc_dataAniversario($Func_dataAniversario){
        $this->Func_dataAniversario = $Func_dataAniversario;
    }

    function setFunc_salario($Func_salario){
        $this->Func_salario = str_replace(",", ".", str_replace(".","",$Func_salario));
    }

    function setFunc_userSistema($Func_userSistema){
        $this->Func_userSistema = $Func_userSistema;
    }

    function setFunc_usuario($Func_usuario){
        $this->Func_usuario = $Func_usuario;
    }

    function setFunc_senha($Func_senha){
        $this->Func_senha = $Func_senha;
    }

    function setFunc_nivelAcesso($Func_nivelAcesso){
        $this->Func_nivelAcesso = $Func_nivelAcesso;
    }

    function setFunc_parceiroCliente($Func_parceiroCliente){
        $this->Func_parceiroCliente = $Func_parceiroCliente;
    }

    function setFunc_parceiroFornecedor($Func_parceiroFornecedor){
        $this->Func_parceiroFornecedor = $Func_parceiroFornecedor;
    }

    function setFunc_parceiroFuncionario($Func_parceiroFuncionario){
        $this->Func_parceiroFuncionario = $Func_parceiroFuncionario;
    }

    function setFunc_cep($Func_cep){
        $this->Func_cep = $Func_cep;
    }

    function setFunc_estado($Func_estado){
        $this->Func_estado = $Func_estado;
    }

    function setFunc_cidade($Func_cidade){
        $this->Func_cidade = $Func_cidade;
    }

    function setFunc_bairro($Func_bairro){
        $this->Func_bairro = $Func_bairro;
    }

    function setFunc_logradouro($Func_logradouro){
        $this->Func_logradouro = $Func_logradouro;
    }

    function setFunc_complemento($Func_complemento){
        $this->Func_complemento = $Func_complemento;
    }

    function setFunc_numero($Func_numero){
        $this->Func_numero = $Func_numero;
    }

    function setFunc_observacao($Func_observacao){
        $this->Func_observacao = $Func_observacao;
    }

    function setFunc_foto($Func_foto){
        $this->Func_foto = $Func_foto;
    }


    
}
?>