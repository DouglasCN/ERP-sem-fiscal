<?php

Class Conexao extends Config{
    private $host, $user, $senha, $banco;

    protected $obj, $itens=array(), $prefix;

    public $paginacao_links, $totalpags, $limite, $inicio;
    function __construct(){

        $this->host = self::BD_HOST;
        $this->user = self::BD_USER;
        $this->senha = self::BD_SENHA;
        $this->banco = self::BD_BANCO;
        $this->prefix = self::BD_PREFIX;

        try {
            if($this->Conectar() == null){
                $this->Conectar();
            }
        }catch(Exception $e){
            exit($e->getMessage(). '<h2> Erro ao conectar com o banco de dados </h2>');
        }
    }

    function TrocarBanco($bd){
        $this->banco = $bd;
    }
    //função para fazer conexão com o banco de dados
    private function Conectar(){

       if(!isset($this->bd)){
           
            $options = array(
                //trasforma o padrao do banco para utf8
                PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8",
                //traz algum alerta de erro
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
            );
            $this->bd = new PDO("mysql:host={$this->host};dbname={$this->banco}", $this->user, $this->senha, $options);
        }
        return $this->bd;
    }

    //função que executa a query
    function ExecuteSQL($query, array $params = NULL){
        $this->obj = $this->Conectar()->prepare($query);

        //eu estou verificando a quantidade de parametros passados na url
        if(@count($params) > 0){
            foreach($params as $key => $value){
                $this->obj->bindvalue($key, $value);
            }
        }
        try{
            return $this->obj->execute();
            
        }catch(Exception $e){
            return false;
            // echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }
    //função para listar os meus elementos
    function ListarDados(){
        return $this->obj->fetch(PDO::FETCH_ASSOC);
    }

    //função para mostrar um quantidade de dados
    function TotalDados(){
       return $this->obj->rowCount(); 
    }

    //função que armazena os itens dentro de um array
    function GetItens(){
        return $this->itens;
    }

    function GetUltimoID(){
        return $this->Conectar()->lastInsertId();
    }
    
    function Dialog($msg, $tipo){
        if($tipo == "sucesso"){
            echo "<div class='col-md-3' style='top: 4%;position: fixed; border-radius: 10px; z-index: 9999;
             border: none; text-align: center;'>
            <div class='card bg-success'>
                <div class='card-header'>
                    <h3 class='card-title'>Sucesso</h3>
                    <div class='card-tools'>
                        <button type='button' class='btn btn-tool' data-card-widget='remove'><i class='fas fa-times'></i>
                        </button>
                    </div>
                </div>
                <div class='card-body'>
                    $msg
                </div>
            </div>
        </div>";
        }else if($tipo == "falha"){
            echo "<div class='col-md-3' style='top: 4%;position: fixed; border-radius: 10px; z-index: 9999;
             border: none; text-align: center;'>
            <div class='card bg-danger'>
                <div class='card-header'>
                    <h3 class='card-title'>Falha</h3>
                    <div class='card-tools'>
                        <button type='button' class='btn btn-tool' data-card-widget='remove'><i class='fas fa-times'></i>
                        </button>
                    </div>
                </div>
                <div class='card-body'>
                    $msg
                </div>
            </div>
        </div>";
        }  
    }

    function PaginacaoLinks($campo, $tabela){
        $pag = new Paginacao();
        $pag->GetPaginacao($campo, $tabela);
        $this->paginacao_links = $pag->link;

        $this->totalpags = $pag->totalpags;
        $this->limite    = $pag->limite;
        $this->inicio    = $pag->inicio;

        if($this->totalpags > 0)
            return "limit {$this->inicio }, {$this->limite}";
        else
            return " ";  
    }

    function PaginacaoLinksProduto($campo, $tabela, $empresa){
        $pag = new Paginacao();
        $pag->GetPaginacaoProduto($campo, $tabela, $empresa);
        $this->paginacao_links = $pag->link;

        $this->totalpags = $pag->totalpags;
        $this->limite    = $pag->limite;
        $this->inicio    = $pag->inicio;

        if($this->totalpags > 0)
            return "limit {$this->inicio }, {$this->limite}";
        else
            return " ";  
    }

    function PaginacaoLinksLike($campo, $tabela, $nome, $condicao){
        $pag = new Paginacao();
        $pag->GetPaginacaoFiltroLike($campo, $tabela, $nome, $condicao);
        $this->paginacao_links = $pag->link;

        $this->totalpags = $pag->totalpags;
        $this->limite    = $pag->limite;
        $this->inicio    = $pag->inicio;

        if($this->totalpags > 0)
            return "limit {$this->inicio }, {$this->limite}";
        else
            return " ";  
    }

    function PaginacaoLinksVendaCliente($empresa, $nome){
        $pag = new Paginacao();
        $pag->GetPaginacaoFiltroVendaCliente($empresa, $nome);
        $this->paginacao_links = $pag->link;

        $this->totalpags = $pag->totalpags;
        $this->limite    = $pag->limite;
        $this->inicio    = $pag->inicio;

        if($this->totalpags > 0)
            return "limit {$this->inicio }, {$this->limite}";
        else
            return " ";  
    }

    function PaginacaoLinksVendaData($empresa, $dataInicial, $dataFinal){
        $pag = new Paginacao();
        $pag->GetPaginacaoFiltroVendaData($empresa, $dataInicial, $dataFinal);
        $this->paginacao_links = $pag->link;

        $this->totalpags = $pag->totalpags;
        $this->limite    = $pag->limite;
        $this->inicio    = $pag->inicio;

        if($this->totalpags > 0)
            return "limit {$this->inicio }, {$this->limite}";
        else
            return " ";  
    }
    
    protected function Paginacao($paginas = array()){
        $filtros = '';
        if(isset($_GET['p-emp'])){
            $filtros = '&p-emp='. $_GET['p-emp'];
        }else if(isset($_GET['p-res'])){
            $filtros = '&p-res='. $_GET['p-res'];
        }else if(isset($_GET['p-est'])){
            $filtros = '&p-est='. $_GET['p-est'];
        }else if(isset($_GET['p-cid'])){
            $filtros = '&p-cid='. $_GET['p-cid'];
        }else if(isset($_GET['p-cli'])){
            $filtros = '&p-cli='. $_GET['p-cli'];
            if(isset($_GET['p-datai']) && isset($_GET['p-dataf'])){
                $filtros .= '&p-datai='. $_GET['p-datai'] . '&p-dataf=' . $_GET['p-dataf'];
            }
        }else if(isset($_GET['p-datai']) && isset($_GET['p-dataf'])){
            $filtros = '&p-datai='. $_GET['p-datai'] . '&p-dataf=' . $_GET['p-dataf'];
        }
        
        $pag  = '<ul class="pagination justify-content-center" style="margin-top: 8px; padding-top: 8px; border-top: 1px solid rgba(0,0,0,.125);">';
        $pag .=   '<li class="page-item"><a  class="page-link" href="?p=1'.$filtros.'" style="border-radius: 100px;"> << Primeiro </a></li>';

        foreach($paginas as $p){
            $pag .=   '<li class="page-item"><a  class="page-link" href="?p='.$p.''.$filtros.'" style="border-radius: 100px;" > '.$p.' </a></li>';
        }
        $pag .=   '<li class="page-item"><a  class="page-link" href="?p='. $this->totalpags .''.$filtros.'" style="border-radius: 100px;"> Ultimo >></a></li>';
        $pag .= '</ul>';

        if($this->totalpags >1)
            return $pag;
    }
    function ShowPaginacao(){
        return $this->Paginacao($this->paginacao_links);
    }
    
    
}

?>