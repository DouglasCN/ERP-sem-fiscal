<?php

class Cliente extends Conexao{
    private $Cli_id, $Cli_nomeFantasia, $Cli_razaoSocial, $Cli_nomeResponsavel, $Cli_inscricaoEstadual, $Cli_CNPJ, $Cli_email, $Cli_contato, $Cli_logradouro, $Cli_numero;
    private $Cli_bairro, $Cli_cidade, $Cli_estado, $Cli_cep, $Cli_dataCadastro, $Cli_cancelado, $Cli_cancelado_por, $Cli_cancelado_dia, $Cli_complemento;

    function __construct(){
        parent::__construct();
    }

    function Preparar($Cli_id, $Cli_nomeFantasia, $Cli_razaoSocial, $Cli_nomeResponsavel, $Cli_inscricaoEstadual, $Cli_CNPJ, 
        $Cli_email, $Cli_contato, $Cli_logradouro, $Cli_numero, $Cli_bairro, $Cli_cidade, $Cli_estado, $Cli_cep, 
        $Cli_dataCadastro, $Cli_cancelado, $Cli_cancelado_por, $Cli_cancelado_dia, $Cli_complemento){

        $this->setCli_id($Cli_id);
        $this->setCli_nomeFantasia($Cli_nomeFantasia);
        $this->setCli_razaoSocial($Cli_razaoSocial);
        $this->setCli_nomeResponsavel($Cli_nomeResponsavel);
        $this->setCli_inscricaoEstadual($Cli_inscricaoEstadual);
        $this->setCli_CNPJ($Cli_CNPJ);
        $this->setCli_email($Cli_email);
        $this->setCli_contato($Cli_contato);
        $this->setCli_logradouro($Cli_logradouro);
        $this->setCli_numero($Cli_numero);
        $this->setCli_bairro($Cli_bairro);
        $this->setCli_cidade($Cli_cidade);
        $this->setCli_estado($Cli_estado);
        $this->setCli_cep($Cli_cep);
        $this->setCli_dataCadastro($Cli_dataCadastro);
        $this->setCli_cancelado($Cli_cancelado);
        $this->setCli_cancelado_por($Cli_cancelado_por);
        $this->setCli_cancelado_dia($Cli_cancelado_dia);
        $this->setCli_complemento($Cli_complemento);
    }

    function Inserir(){
        
        $query = "INSERT INTO {$this->prefix}cliente (nomeFantasia, nomeResponsavel, razaoSocial, inscricaoEstadual, CNPJ, 
        email, contato, logradouro, complemento, numero, bairro, cidade, estado, cep, dataCadastro, cancelado) values ";
        $query .= "(:nomeFantasia, :nomeResponsavel, :razaoSocial, :inscricaoEstadual, :CNPJ, :email, :contato, :logradouro, 
        :complemento, :numero, :bairro, :cidade, :estado, :cep, :dataCadastro, :cancelado)";
        
        $params = array(
            ':nomeFantasia' => $this->getCli_nomeFantasia(),
            ':nomeResponsavel' => $this->getCli_nomeResponsavel(),
            ':razaoSocial' => $this->getCli_razaoSocial(),
            ':inscricaoEstadual' => $this->getCli_inscricaoEstadual(),
            ':CNPJ' => $this->getCli_CNPJ(),
            ':email' => $this->getCli_email(),
            ':contato' => $this->getCli_contato(),
            ':logradouro' => $this->getCli_logradouro(),
            ':complemento' => $this->getCli_complemento(),
            ':numero' => $this->getCli_numero(),
            ':bairro' => $this->getCli_bairro(),
            ':cidade' => $this->getCli_cidade(),
            ':estado' => $this->getCli_estado(),
            ':cep' => $this->getCli_cep(),
            ':dataCadastro' => $this->getCli_dataCadastro(),
            ':cancelado' => $this->getCli_cancelado()
        );
        
        if($this->ExecuteSQL($query, $params)){
            $this->Dialog("Cliente cadastrado(a) com sucesso!", "sucesso");

            $query = "INSERT INTO {$this->prefix}log_ (acao, tabela, dia, id_Usuario) values ";
            $query .= "(:acao, :tabela, :dia, :id_Usuario)";
            $paramsLog = array(
                ':acao' => "Inserido um novo cliente, id - " . $this->GetUltimoID(),
                ':tabela' => "cliente",
                ':dia' => date('Y-m-d'),
                ':id_Usuario' => $_SESSION['ATACADOV']['user_ID']
            );
            $this->ExecuteSQL($query, $paramsLog);
            Rotas::Redirecionar(1, Rotas::pag_Clientes());       
        }else {
            $this->Dialog("Houve um problema ao cadastrar o cliente, entre em contato com o desenvolvedor!", "falha");
        }
    }

    function Alterar(){
        
        $query = "UPDATE {$this->prefix}cliente set nomeFantasia = :nomeFantasia, razaoSocial = :razaoSocial, nomeResponsavel = :nomeResponsavel, 
        inscricaoEstadual = :inscricaoEstadual, CNPJ = :CNPJ, email = :email, contato = :contato, logradouro = :logradouro, 
        complemento = :complemento, numero = :numero, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep WHERE cliente.id_Cliente = :id ";
    
        $params = array(
            ':nomeFantasia' => $this->getCli_nomeFantasia(),
            ':nomeResponsavel' => $this->getCli_nomeResponsavel(),
            ':razaoSocial' => $this->getCli_razaoSocial(),
            ':inscricaoEstadual' => $this->getCli_inscricaoEstadual(),
            ':CNPJ' => $this->getCli_CNPJ(),
            ':email' => $this->getCli_email(),
            ':contato' => $this->getCli_contato(),
            ':logradouro' => $this->getCli_logradouro(),
            ':complemento' => $this->getCli_complemento(),
            ':numero' => $this->getCli_numero(),
            ':bairro' => $this->getCli_bairro(),
            ':cidade' => $this->getCli_cidade(),
            ':estado' => $this->getCli_estado(),
            ':cep' => $this->getCli_cep(),
            ':id' => $this->getCli_id()
        );
        
        if($this->ExecuteSQL($query, $params)){
            $this->Dialog("Cliente alterado(a) com sucesso.", "sucesso");

            $query = "INSERT INTO {$this->prefix}log_ (acao, tabela, dia, id_Usuario) values ";
            $query .= "(:acao, :tabela, :dia, :id_Usuario)";
            $paramsLog = array(
                ':acao' => "Alterado o cliente, id - " . $this->getCli_id(),
                ':tabela' => "cliente",
                ':dia' => date('Y-m-d'),
                ':id_Usuario' => $_SESSION['ATACADOV']['user_ID']
            );
            $this->ExecuteSQL($query, $paramsLog);
            Rotas::Redirecionar(1, Rotas::pag_Cliente($this->getCli_id()));        
        }else {
            $this->Dialog("Houve um problema ao alterar o cliente, entre em contato com o desenvolvedor!", "falha");
        }

    }

    function Excluir($id){

        $query = "UPDATE {$this->prefix}cliente set cancelado = 1, cancelado_por = :cancelado_por, cancelado_dia = :cancelado_dia 
            WHERE id_Cliente = :id";

        $params = array(
            ':cancelado_por' => $_SESSION['ATACADOV']['user_ID'],
            ':cancelado_dia' => date('Y-m-d'),
            ':id' => (int)$id
        );
        
        if($this->ExecuteSQL($query, $params)){
            $this->Dialog("Cliente excluido(a) com sucesso.", "sucesso");

            $query = "INSERT INTO {$this->prefix}log_ (acao, tabela, dia, id_Usuario) values ";
            $query .= "(:acao, :tabela, :dia, :id_Usuario)";
            $paramsLog = array(
                ':acao' => "Exclusão do cliente, id - " . (int)$id,
                ':tabela' => "cliente",
                ':dia' => date('Y-m-d'),
                ':id_Usuario' => $_SESSION['ATACADOV']['user_ID']
            );
            $this->ExecuteSQL($query, $paramsLog);

            Rotas::Redirecionar(1, Rotas::pag_Clientes());       
        }else {
            $this->Dialog("Houve um problema ao excluir o cliente, entre em contato com o desenvolvedor!", "falha");
        }
    }

    function GetCliente(){
        //query para buscar os cursos de uma categoria especifica
        $query = "SELECT * FROM {$this->prefix}cliente WHERE cancelado = false ";
        
        $query .= $this->PaginacaoLinks("id_Cliente",$this->prefix."cliente");
        //eu estou executando o meu metedo ExecuteSQL da classe Conexao
        $this->ExecuteSQL($query);

        $this->GetLista();
    }
    
    function GetClienteLista(){
        //query para buscar os cursos de uma categoria especifica
        $query = "SELECT * FROM {$this->prefix}cliente WHERE cancelado = false ";
         
        //eu estou executando o meu metedo ExecuteSQL da classe Conexao
        $this->ExecuteSQL($query);

        $this->GetLista();
    }

    function GetClienteID($id){
        //query para buscar os cursos de uma categoria especifica
        $query = "SELECT * FROM {$this->prefix}cliente WHERE cancelado = false AND id_Cliente = :id";
        
        $params = array(
            ':id' => (int)$id,
        );
        $this->ExecuteSQL($query, $params);

        $this->GetLista();
    }

    function GetClienteEmpresa($nomeFantasia){
        //query para buscar os cursos de uma categoria especifica
        $query = "SELECT * FROM {$this->prefix}cliente WHERE nomeFantasia LIKE '%$nomeFantasia%' AND cancelado = false ";
        
        $query .= $this->PaginacaoLinksLike("id_Cliente",$this->prefix."cliente", $nomeFantasia, "nomeFantasia");

        $this->ExecuteSQL($query);

        $this->GetLista();
    }

    function GetClienteResponsavel($razaoSocial){
        //query para buscar os cursos de uma categoria especifica
        $query = "SELECT * FROM {$this->prefix}cliente WHERE razaoSocial LIKE '%$razaoSocial%'  AND cancelado = false ";
        
        $query .= $this->PaginacaoLinksLike("id_Cliente",$this->prefix."cliente", $razaoSocial, "razaoSocial");
        
        $this->ExecuteSQL($query);

        $this->GetLista();
    }

    function GetClienteEstado($estado){
        //query para buscar os cursos de uma categoria especifica
        $query = "SELECT * FROM {$this->prefix}cliente WHERE estado LIKE '%$estado%'  AND cancelado = false ";
        
        $query .= $this->PaginacaoLinksLike("id_Cliente",$this->prefix."cliente", $estado, "estado");
        
        $this->ExecuteSQL($query);

        $this->GetLista();
    }

    function GetClienteCidade($cidade){
        //query para buscar os cursos de uma categoria especifica
        $query = "SELECT * FROM {$this->prefix}cliente WHERE cidade LIKE '%$cidade%'  AND cancelado = false ";
        
        $query .= $this->PaginacaoLinksLike("id_Cliente",$this->prefix."cliente", $cidade, "cidade");
        
        $this->ExecuteSQL($query);

        $this->GetLista();
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
    function getCli_id(){
        return $this->Cli_id;
    }
    function getCli_nomeFantasia(){
        return $this->Cli_nomeFantasia;
    }
    function getCli_razaoSocial(){
        return $this->Cli_razaoSocial;
    }
    function getCli_nomeResponsavel(){
        return $this->Cli_nomeResponsavel;
    }
    function getCli_inscricaoEstadual(){
        return $this->Cli_inscricaoEstadual;
    }
    function getCli_CNPJ(){
        return $this->Cli_CNPJ;
    }
    function getCli_email(){
        return $this->Cli_email;
    }
    function getCli_contato(){
        return $this->Cli_contato;
    }
    function getCli_logradouro(){
        return $this->Cli_logradouro;
    }
    function getCli_numero(){
        return $this->Cli_numero;
    }
    function getCli_bairro(){
        return $this->Cli_bairro;
    }
    function getCli_cidade(){
        return $this->Cli_cidade;
    }
    function getCli_estado(){
        return $this->Cli_estado;
    }
    function getCli_cep(){
        return $this->Cli_cep;
    }
    function getCli_dataCadastro(){
        return $this->Cli_dataCadastro;
    }
    function getCli_cancelado(){
        return $this->Cli_cancelado;
    }
    function getCli_cancelado_por(){
        return $this->Cli_cancelado_por;
    }
    function getCli_cancelado_dia(){
        return $this->Cli_cancelado_dia;
    }
    function getCli_complemento(){
        return $this->Cli_complemento;
    }

    
    //metodos set
    function setCli_id($Cli_id){
       $this->Cli_id = $Cli_id;
    }
    function setCli_nomeFantasia($Cli_nomeFantasia){
       $this->Cli_nomeFantasia = $Cli_nomeFantasia;
    }
    function setCli_razaoSocial($Cli_razaoSocial){
       $this->Cli_razaoSocial = $Cli_razaoSocial;
    }
    function setCli_nomeResponsavel($Cli_nomeResponsavel){
       $this->Cli_nomeResponsavel = $Cli_nomeResponsavel;
    }
    function setCli_inscricaoEstadual($Cli_inscricaoEstadual){
       $this->Cli_inscricaoEstadual = $Cli_inscricaoEstadual;
    }
    function setCli_CNPJ($Cli_CNPJ){
       $this->Cli_CNPJ = $Cli_CNPJ;
    }
    function setCli_email($Cli_email){
       $this->Cli_email = $Cli_email;
    }
    function setCli_contato($Cli_contato){
       $this->Cli_contato = $Cli_contato;
    }
    function setCli_logradouro($Cli_logradouro){
       $this->Cli_logradouro = $Cli_logradouro;
    }
    function setCli_numero($Cli_numero){
       $this->Cli_numero = $Cli_numero;
    }
    function setCli_bairro($Cli_bairro){
       $this->Cli_bairro = $Cli_bairro;
    }
    function setCli_cidade($Cli_cidade){
       $this->Cli_cidade = $Cli_cidade;
    }
    function setCli_estado($Cli_estado){
       $this->Cli_estado = $Cli_estado;
    }
    function setCli_cep($Cli_cep){
       $this->Cli_cep = $Cli_cep;
    }
    function setCli_dataCadastro($Cli_dataCadastro){
       $this->Cli_dataCadastro = $Cli_dataCadastro;
    }
    function setCli_cancelado($Cli_cancelado){
       $this->Cli_cancelado = $Cli_cancelado;
    }
    function setCli_cancelado_por($Cli_cancelado_por){
       $this->Cli_cancelado_por = $Cli_cancelado_por;
    }
    function setCli_cancelado_dia($Cli_cancelado_dia){
       $this->Cli_cancelado_dia = $Cli_cancelado_dia;
    }
    function setCli_complemento($Cli_complemento){
        $this->Cli_complemento = $Cli_complemento;
    }

    
}
?>