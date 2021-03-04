<?php

class PesquisaModulo extends Conexao{
    private $PesMod_codigoUnico, $PesMod_nomeModulo, $PesMod_descricoesPesquisa, $PesMod_excluido, $PesMod_quemCadastrou ;
    private $PesMod_quemAtualizou, $PesMod_atualizavel;

    function __construct(){
        parent::__construct();
    }

    function Preparar($PesMod_codigoUnico, $PesMod_nomeModulo, $PesMod_descricoesPesquisa, $PesMod_excluido, $PesMod_quemCadastrou, 
    $PesMod_quemAtualizou, $PesMod_atualizavel){

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
    

    //INICIO DE BUSCAS DOS DADOS DE PRODUTO PARA VENDA
    function PesquisaModulos($descricao){
        //query para buscar os cursos de uma categoria especifica
        $query = "SELECT * FROM {$this->prefix}pesquisamodulo p INNER JOIN modulosistema m ON  p.nomeModulo = m.codigoUnico 
         WHERE  p.descricoesPesquisa LIKE '%$descricao%' AND excluido = false ";
        //eu estou executando o meu metedo ExecuteSQL da classe Conexao
        $this->ExecuteSQL($query);

        $this->GetListaJSON();
    } 
    

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

    //metods get
    function getPro_id(){
        return $this->Pro_id;
    }

    
    //metodos set
    function setPro_id($Pro_id){
        $this->Pro_id = $Pro_id;
    }


}
?>