<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistema </title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{$ROTA_TEMA}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{$ROTA_TEMA}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{$ROTA_TEMA}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{$ROTA_TEMA}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{$ROTA_TEMA}/dist/css/adminlte.min.css"> 
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{$ROTA_TEMA}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{$ROTA_TEMA}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{$ROTA_TEMA}/plugins/summernote/summernote-bs4.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed" style="font-size: 90%">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a onclick="" class="nav-link">Home</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto" style="    display: flex; align-items: center;">
        <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
            <input id="searchModule" onBlur="closeDropdownModule()" class="form-control form-control-navbar" type="search" placeholder="Pesquisar" aria-label="Search">
            <!-- ITENS DA BUSCA RELACIONADO AOS MODULOS -->
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="dropdownModule" style="min-width: 200px !important">
            
            </div>
            <!-- FIM -->
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form> 
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="min-width: 200px !important">
            
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> Configurações
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> Sair
            </a>
            <div class="dropdown-divider"></div>
          </div>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="" class="brand-link" style="background: #134f81; border-color: black; color: #fff;">
        <span class="brand-text font-weight-light">ERP</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar" style="background: #134f81;  color: #fff;">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-color: black;">
          <div class="image">
          </div>
          <div class="info">
            <a href="" class="d-block">- USER-</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu"
            data-accordion="false">   
            <!-- Primeira Opção -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-user-friends nav-icon"></i>
                <p>
                  Parceiros
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Clientes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fornecedores</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{$PAG_FUNCIONARIOS}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Funcionários</p>
                  </a>
                </li>
              </ul>
            </li>
            
            <!-- Segunda Opção -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-boxes nav-icon"></i>
                <p>
                  Produtos
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cadastrar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Estoque</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Compras</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Etiquetas</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Terceira Opção -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-coins nav-icon"></i>
                <p>
                  Vendas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Orçamento</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Condicional</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Caixa</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Serviços</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pedido</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Quarta Opção -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-balance-scale-left"></i>
                <p>
                  Fluxo de caixa
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contas a Pagar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contas a Receber</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Caixas</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Quinta Opção -->
            <li class="nav-item ">
              <a href="" class="nav-link">
                <i class="fas fa-copy nav-icon"></i>
                <p>
                  Relatórios gerenciais
                </p>
              </a>
            </li>

            <!-- Sexta Opção -->
            <li class="nav-item ">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-tools"></i>
                <p>
                  Configurações
                </p>
              </a>
            </li>

            <!-- Setimo Opção -->
            <li class="nav-item ">
              <a href="" class="nav-link">
                <i class="fas fa-stopwatch nav-icon"></i>
                <p>
                  Ponto
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper" >
        {php}
        if(Rotas::get_Pagina() == 0){

        }else{
        {/php}
        

        {php}
        }
        {/php}
    </div>

    <footer class="main-footer">
      <!-- <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0-pre
      </div> -->
    </footer>

    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>

  </div>

</body>
<!-- jQuery -->
<script src="{$ROTA_TEMA}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{$ROTA_TEMA}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{$ROTA_TEMA}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Sparkline -->
<script src="{$ROTA_TEMA}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{$ROTA_TEMA}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{$ROTA_TEMA}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{$ROTA_TEMA}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{$ROTA_TEMA}/plugins/moment/moment.min.js"></script>
<script src="{$ROTA_TEMA}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{$ROTA_TEMA}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{$ROTA_TEMA}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{$ROTA_TEMA}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{$ROTA_TEMA}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{$ROTA_TEMA}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{$ROTA_TEMA}/dist/js/pages/dashboard.js"></script> -->
<script src="{$ROTA_TEMA}/js/verificacoes.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script src="{$ROTA_TEMA}/js/index.js"></script>



</html>