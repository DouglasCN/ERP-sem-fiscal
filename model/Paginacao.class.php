<?php
class Paginacao extends Conexao{

    public $limite, $inicio, $totalpags, $link = array();

    function GetPaginacao($campo, $tabela){
        $query = "SELECT {$campo} FROM {$tabela} WHERE cancelado = false ";
        $this->ExecuteSQL($query);
        //quantidade de dados na tabela
        $total = $this->TotalDados();
        //limite de dados por pagna
        $this->limite = Config::BD_LIMIT_POR_PAG;
        //quantidade de paginas que ira ter
        $paginas = ceil($total/$this->limite);
        $this->totalpags = $paginas;
        //recebe a pagina em que o usuario esta querendo ir ou que ira iniciar
        $p = (int)isset($_GET['p']) ? $_GET['p'] : 1; 
        //controle de pesquisa, caso o usuario pesquise pela URL uma pagina que não exista, sera jogado para a ultima pagina
        if ($p > $paginas) {
            $p = $paginas;
        }
        $this->inicio = ($p * $this->limite) - $this->limite;

        $tolerancia = 2;
        $mostrar = $p + $tolerancia;
        if($mostrar > $paginas){
            $mostrar = $paginas;
        }
        for($i = ($p - $tolerancia) ;$i <= $mostrar; $i++){
            if ($i < 1) {
                $i = 1;
            }
            array_push($this->link, $i);
        }
    }

    function GetPaginacaoProduto($campo, $tabela, $empresa){
        $query = "SELECT {$campo} FROM {$tabela} WHERE cancelado = false AND empresa = '{$empresa}' ";
        $this->ExecuteSQL($query);
        //quantidade de dados na tabela
        $total = $this->TotalDados();
        //limite de dados por pagna
        $this->limite = Config::BD_LIMIT_POR_PAG;
        //quantidade de paginas que ira ter
        $paginas = ceil($total/$this->limite);
        $this->totalpags = $paginas;
        //recebe a pagina em que o usuario esta querendo ir ou que ira iniciar
        $p = (int)isset($_GET['p']) ? $_GET['p'] : 1; 
        //controle de pesquisa, caso o usuario pesquise pela URL uma pagina que não exista, sera jogado para a ultima pagina
        if ($p > $paginas) {
            $p = $paginas;
        }
        $this->inicio = ($p * $this->limite) - $this->limite;

        $tolerancia = 2;
        $mostrar = $p + $tolerancia;
        if($mostrar > $paginas){
            $mostrar = $paginas;
        }
        for($i = ($p - $tolerancia) ;$i <= $mostrar; $i++){
            if ($i < 1) {
                $i = 1;
            }
            array_push($this->link, $i);
        }
    }

    function GetPaginacaoFiltroLike($campo, $tabela, $nome, $condicao){
        $query = "SELECT {$campo} FROM {$tabela} WHERE cancelado = false AND {$condicao} LIKE '%$nome%' ";
        $this->ExecuteSQL($query);
        //quantidade de dados na tabela
        $total = $this->TotalDados();
        //limite de dados por pagna
        $this->limite = Config::BD_LIMIT_POR_PAG;
        //quantidade de paginas que ira ter
        $paginas = ceil($total/$this->limite);
        $this->totalpags = $paginas;
        //recebe a pagina em que o usuario esta querendo ir ou que ira iniciar
        $p = (int)isset($_GET['p']) ? $_GET['p'] : 1; 
        //controle de pesquisa, caso o usuario pesquise pela URL uma pagina que não exista, sera jogado para a ultima pagina
        if ($p > $paginas) {
            $p = $paginas;
        }
        $this->inicio = ($p * $this->limite) - $this->limite;

        $tolerancia = 2;
        $mostrar = $p + $tolerancia;
        if($mostrar > $paginas){
            $mostrar = $paginas;
        }
        for($i = ($p - $tolerancia) ;$i <= $mostrar; $i++){
            if ($i < 1) {
                $i = 1;
            }
            array_push($this->link, $i);
        }
    }

    function GetPaginacaoFiltroVendaCliente($empresa ,$nome){
        
        $query = "SELECT venda.id_Venda FROM venda INNER JOIN cliente ON venda.id_Cliente = cliente.id_Cliente WHERE venda.cancelado = 
        false AND empresa = '$empresa' AND cliente.nomeFantasia LIKE '%$nome%'";
        $this->ExecuteSQL($query);
        //quantidade de dados na tabela
        $total = $this->TotalDados();
        //limite de dados por pagna
        $this->limite = Config::BD_LIMIT_POR_PAG;
        //quantidade de paginas que ira ter
        $paginas = ceil($total/$this->limite);
        $this->totalpags = $paginas;
        //recebe a pagina em que o usuario esta querendo ir ou que ira iniciar
        $p = (int)isset($_GET['p']) ? $_GET['p'] : 1; 
        //controle de pesquisa, caso o usuario pesquise pela URL uma pagina que não exista, sera jogado para a ultima pagina
        if ($p > $paginas) {
            $p = $paginas;
        }
        $this->inicio = ($p * $this->limite) - $this->limite;

        $tolerancia = 2;
        $mostrar = $p + $tolerancia;
        if($mostrar > $paginas){
            $mostrar = $paginas;
        }
        for($i = ($p - $tolerancia) ;$i <= $mostrar; $i++){
            if ($i < 1) {
                $i = 1;
            }
            array_push($this->link, $i);
        }
    }

    function GetPaginacaoFiltroVendaData($empresa, $dataInicial, $dataFinal){
        
        $query = "SELECT * FROM venda INNER JOIN cliente ON venda.id_Cliente = cliente.id_Cliente WHERE venda.cancelado = 
        false AND empresa = '$empresa' AND venda.dataCriacao BETWEEN '$dataInicial' AND '$dataFinal'";

        $this->ExecuteSQL($query);
        //quantidade de dados na tabela
        $total = $this->TotalDados();
        //limite de dados por pagna
        $this->limite = Config::BD_LIMIT_POR_PAG;
        //quantidade de paginas que ira ter
        $paginas = ceil($total/$this->limite);
        $this->totalpags = $paginas;
        //recebe a pagina em que o usuario esta querendo ir ou que ira iniciar
        $p = (int)isset($_GET['p']) ? $_GET['p'] : 1; 
        //controle de pesquisa, caso o usuario pesquise pela URL uma pagina que não exista, sera jogado para a ultima pagina
        if ($p > $paginas) {
            $p = $paginas;
        }

        $this->inicio = ($p * $this->limite) - $this->limite;

        $tolerancia = 2;
        $mostrar = $p + $tolerancia;
        if($mostrar > $paginas){
            $mostrar = $paginas;
        }
        for($i = ($p - $tolerancia) ;$i <= $mostrar; $i++){
            if ($i < 1) {
                $i = 1;
            }
            array_push($this->link, $i);
        }
    }
}

?>