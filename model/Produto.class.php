<?php

class Produto extends Conexao{
    private $Pro_id, $Pro_nomeProduto, $Pro_referencia, $Pro_custo, $Pro_venda, $Pro_lucro, $Pro_cancelado, $Pro_cancelado_por, $Pro_cancelado_dia ;
    private $Pro_empresa;

    function __construct(){
        parent::__construct();
    }

    function Preparar($Pro_id, $Pro_nomeProduto, $Pro_referencia, $Pro_custo, $Pro_venda, $Pro_lucro, $Pro_cancelado, $Pro_cancelado_por, 
        $Pro_cancelado_dia, $Pro_empresa){

        $this->setPro_id($Pro_id);
        $this->setPro_nomeProduto($Pro_nomeProduto);
        $this->setPro_referencia($Pro_referencia);
        $this->setPro_custo($Pro_custo);
        $this->setPro_venda($Pro_venda);
        $this->setPro_lucro($Pro_lucro);
        $this->setPro_cancelado($Pro_cancelado);
        $this->setPro_cancelado_por($Pro_cancelado_por);
        $this->setPro_cancelado_dia($Pro_cancelado_dia);
        $this->setPro_empresa($Pro_empresa);
    }

    function Inserir(){
        
        $query = "INSERT INTO {$this->prefix}produto (nomeProduto, referencia, custo, venda, lucro, empresa, cancelado) values ";
        $query .= "(:nomeProduto, :referencia, :custo, :venda, :lucro, :empresa ,:cancelado)";
        
        $params = array(
            ':nomeProduto' => $this->getPro_nomeProduto(),
            ':referencia' => $this->getPro_referencia(),
            ':custo' => $this->getPro_custo(),
            ':venda' => $this->getPro_venda(),
            ':lucro' => $this->getPro_lucro(),
            ':empresa' => $this->getPro_empresa(),
            ':cancelado' => $this->getPro_cancelado()
        );
        
        if($this->ExecuteSQL($query, $params)){
            $this->Dialog("Produto cadastrado(a) com sucesso.", "sucesso");

            $query = "INSERT INTO {$this->prefix}log_ (acao, tabela, dia, id_Usuario) values ";
            $query .= "(:acao, :tabela, :dia, :id_Usuario)";
            $paramsLog = array(
                ':acao' => "Inserio um novo produto, id - " . $this->GetUltimoID(),
                ':tabela' => "produto",
                ':dia' => date('Y-m-d'),
                ':id_Usuario' => $_SESSION['ATACADOV']['user_ID']
            );
            $this->ExecuteSQL($query, $paramsLog);

            Rotas::Redirecionar(1, Rotas::pag_Produtos());       
        }else {
            $this->Dialog("Houve um problema ao inserir um produto, entre em contato com o desenvolvedor!", "falha");
        }
        
    }

    function Alterar(){
        
        $query = "UPDATE {$this->prefix}produto set nomeProduto = :nomeProduto, referencia = :referencia, custo = :custo, 
        venda = :venda, lucro = :lucro  WHERE id_Produto = :id ";

        $params = array(
            ':nomeProduto' => $this->getPro_nomeProduto(),
            ':referencia' => $this->getPro_referencia(),
            ':custo' => $this->getPro_custo(),
            ':venda' => $this->getPro_venda(),
            ':lucro' => $this->getPro_lucro(),
            ':id' => $this->getPro_id()
        );
        
        if($this->ExecuteSQL($query, $params)){
            $this->Dialog("Produto alterado(a) com sucesso.", "sucesso");

            $query = "INSERT INTO {$this->prefix}log_ (acao, tabela, dia, id_Usuario) values ";
            $query .= "(:acao, :tabela, :dia, :id_Usuario)";
            $paramsLog = array(
                ':acao' => "Alterado o produto, id - " . $this->getPro_id(),
                ':tabela' => "produto",
                ':dia' => date('Y-m-d'),
                ':id_Usuario' => $_SESSION['ATACADOV']['user_ID']
            );
            $this->ExecuteSQL($query, $paramsLog);

            Rotas::Redirecionar(1, Rotas::pag_Produto($this->getPro_id()));       
        }else {
            $this->Dialog("Houve um problema ao alterar um produto, entre em contato com o desenvolvedor!", "falha");
        }
    }

    function Excluir($id){
        
        $query = "UPDATE {$this->prefix}produto set cancelado = true, cancelado_por = :cancelado_por, cancelado_dia = :cancelado_dia 
        WHERE id_Produto = :id_Produto ";

        $params = array(
            ':cancelado_por' => $_SESSION['ATACADOV']['user_ID'],
            ':cancelado_dia' => date('Y-m-d'),
            ':id_Produto' => (int)$id
        );
        
        if($this->ExecuteSQL($query, $params)){
            $this->Dialog("Produto excluido com sucesso.", "sucesso");

            $query = "INSERT INTO {$this->prefix}log_ (acao, tabela, dia, id_Usuario) values ";
            $query .= "(:acao, :tabela, :dia, :id_Usuario)";
            $paramsLog = array(
                ':acao' => "Exclusão do produto, id - " . (int)$id,
                ':tabela' => "produto",
                ':dia' => date('Y-m-d'),
                ':id_Usuario' => $_SESSION['ATACADOV']['user_ID']
            );
            $this->ExecuteSQL($query, $paramsLog);

            Rotas::Redirecionar(1, Rotas::pag_Produtos());       
        }else {
            $this->Dialog("Houve um problema ao cancelar um produto, entre em contato com o desenvolvedor!", "falha");
        }
    }

    function GetProduto(){
        //query para buscar os cursos de uma categoria especifica
        $query = "SELECT * FROM {$this->prefix}produto WHERE cancelado = false AND empresa = :empresa ";
        
        $query .= $this->PaginacaoLinksProduto("id_Produto",$this->prefix."produto", $_SESSION['ATACADOV']['empresa']);
        //eu estou executando o meu metedo ExecuteSQL da classe Conexao
        $params = array(
            ':empresa' => $_SESSION['ATACADOV']['empresa']
        );
        $this->ExecuteSQL($query, $params);
        $this->GetLista();
    }

    function GetProdutoLista(){
        //query para buscar os cursos de uma categoria especifica
        $query = "SELECT * FROM {$this->prefix}produto WHERE cancelado = false AND empresa = :empresa ";
        
        //eu estou executando o meu metedo ExecuteSQL da classe Conexao
        $params = array(
            ':empresa' => $_SESSION['ATACADOV']['empresa']
        );
        $this->ExecuteSQL($query, $params);
        $this->GetLista();
    }

    function GetProdutoID($id){
        //query para buscar os cursos de uma categoria especifica
        $query = "SELECT * FROM {$this->prefix}produto WHERE id_Produto = :idProduto AND cancelado = false AND empresa = :empresa ";

        $query .= $this->PaginacaoLinksLike("id_Produto",$this->prefix."produto", $id , "id_Produto");
        //eu estou fazendo com que a minha linha so receba valor inteiro para evitar SQLInjection
        $params = array(
            ':empresa'=> $_SESSION['ATACADOV']['empresa'],
            ':idProduto' => (int)$id
        );

        //eu estou executando o meu metedo ExecuteSQL da classe Conexao
        $this->ExecuteSQL($query, $params);

        $this->GetListaPadrao();
    } 
    
    function GetProdutoREF($referencia){
        //query para buscar os cursos de uma categoria especifica
        $query = "SELECT * FROM {$this->prefix}produto WHERE referencia LIKE '%$referencia%' AND cancelado = false AND empresa = :empresa ";

        $query .= $this->PaginacaoLinksLike("id_Produto",$this->prefix."produto", $referencia , "referencia");
        //eu estou fazendo com que a minha linha so receba valor inteiro para evitar SQLInjection
        $params = array(
            ':empresa'=> $_SESSION['ATACADOV']['empresa']
        );

        //eu estou executando o meu metedo ExecuteSQL da classe Conexao
        $this->ExecuteSQL($query, $params);

        $this->GetListaPadrao();
    }  

    function GetProdutoNome($produto){
        //query para buscar os cursos de uma categoria especifica
        $query = "SELECT * FROM {$this->prefix}produto WHERE cancelado = false AND nomeProduto LIKE '%$produto%' AND empresa = :empresa ";

        $query .= $this->PaginacaoLinksLike("id_Produto",$this->prefix."produto", $produto, "nomeProduto");
        
        $params = array(
            ':empresa'=> $_SESSION['ATACADOV']['empresa']
        );
        //eu estou executando o meu metedo ExecuteSQL da classe Conexao
        $this->ExecuteSQL($query, $params);

        $this->GetLista();
    }

    //INICIO DE BUSCAS DOS DADOS DE PRODUTO PARA VENDA
    function GetDadosProdutoId($nome){
        //query para buscar os cursos de uma categoria especifica
        $query = "SELECT * FROM {$this->prefix}pesquisamodulo p INNER JOIN modulosistema m ON  p.nomeModulo = m.codigoUnico 
         WHERE  p.descricoesPesquisa LIKE '%$nome%' AND excluido = false ";
        //eu estou executando o meu metedo ExecuteSQL da classe Conexao
        $this->ExecuteSQL($query);

        $this->GetListaJSON();
    } 
    
    function GetDadosProdutoREF($REF){
        //query para buscar os cursos de uma categoria especifica
        $query = "SELECT * FROM {$this->prefix}produto WHERE referencia = :REF AND cancelado = false ";

        $params = array(
            ':REF'=> $REF
        );

        //eu estou executando o meu metedo ExecuteSQL da classe Conexao
        $this->ExecuteSQL($query, $params);

        $this->GetListaJSON();
    }  
    //FIM DAS BUSCAS DE DADOS PARA VENDA

    private function GetLista(){
        $i = 1;
        //eu estou chamando o meu metodo listar dados da classe conexão
        while($lista = $this->ListarDados()):
        $this->itens[$i] = array(
            'idProduto'=> $lista['id_Produto'],
            'nomeProduto' => $lista['nomeProduto'],
            'referencia' => $lista['referencia'],
            'custo' => 'R$ ' . str_replace(".", ",", $lista['custo']),
            'venda' => 'R$ ' . str_replace(".", ",", $lista['venda']),
            'lucro' => 'R$ ' . str_replace(".", ",", $lista['lucro'])
        );
        $i++;
        endwhile;
    }
    
    private function GetListaJSON(){
        
        if($this->TotalDados() > 0 ){

            $i = 1;
            while($lista = $this->ListarDados()):
                $produtos[$i] = [
                    'pagina'=> $lista['descricao'],
                    'descricao'=> ucfirst($lista['descricao'])
                ];
                $i++;
            endwhile;
            echo json_encode(array_values($produtos));
            
        }
    }

    private function GetListaPadrao(){
        $i = 1;
        //eu estou chamando o meu metodo listar dados da classe conexão
        while($lista = $this->ListarDados()):
        $this->itens[$i] = array(
            'idProduto'=> $lista['id_Produto'],
            'nomeProduto' => $lista['nomeProduto'],
            'referencia' => $lista['referencia'],
            'custo' => str_replace(".", ",", $lista['custo']),
            'venda' => str_replace(".", ",", $lista['venda']),
            'lucro' => str_replace(".", ",", $lista['lucro'])
        );
        $i++;
        endwhile;
    }

    //metods get
    function getPro_id(){
        return $this->Pro_id;
    }
    function getPro_nomeProduto(){
        return $this->Pro_nomeProduto;
    }
    function getPro_referencia(){
        return $this->Pro_referencia;
    }
    function getPro_custo(){
        return $this->Pro_custo;
    }
    function getPro_venda(){
        return $this->Pro_venda;
    }
    function getPro_lucro(){
        return $this->Pro_lucro;
    }
    function getPro_cancelado(){
        return $this->Pro_cancelado;
    }
    function getPro_cancelado_por(){
        return $this->Pro_cancelado_por;
    }
    function getPro_cancelado_dia(){
        return $this->Pro_cancelado_dia;
    }
    function getPro_empresa(){
        return $this->Pro_empresa;
    }

    
    //metodos set
    function setPro_id($Pro_id){
        $this->Pro_id = $Pro_id;
    }
    function setPro_nomeProduto($Pro_nomeProduto){
        $this->Pro_nomeProduto = $Pro_nomeProduto;
    }
    function setPro_referencia($Pro_referencia){
        $this->Pro_referencia = $Pro_referencia;
    }
    function setPro_custo($Pro_custo){
        $this->Pro_custo = str_replace(",", ".", $Pro_custo);
    }
    function setPro_venda($Pro_venda){
        $this->Pro_venda = str_replace(",", ".", $Pro_venda);
    }
    function setPro_lucro($Pro_lucro){
        $this->Pro_lucro = str_replace(",", ".", $Pro_lucro);
    }
    function setPro_cancelado($Pro_cancelado){
        $this->Pro_cancelado = $Pro_cancelado;
    }
    function setPro_cancelado_por($Pro_cancelado_por){
        $this->Pro_cancelado_por = $Pro_cancelado_por;
    }
    function setPro_cancelado_dia($Pro_cancelado_dia){
        $this->Pro_cancelado_dia = $Pro_cancelado_dia;
    }
    function setPro_empresa($Pro_empresa){
        $this->Pro_empresa = $Pro_empresa;
    }


}
?>