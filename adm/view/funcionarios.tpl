<link rel="stylesheet" href="{$ROTA_TEMA}/css/funcionarios.css">
<div class="container" style='padding-bottom:10px'>
  <div class="tab">
    <input class="inputAba" type="radio" name="tabs" id="tab1" checked onclick="abaBlock()">
    <label class="labelAba" for="tab1">Funcionários</label>

    <input class="inputAba" type="radio" name="tabs" id="tab2" onclick="abaBlock()">
    <label class="labelAba" for="tab2">Cadastrar</label>

    <input class="inputAba" type="radio" name="tabs" id="tab3" onclick="abaBlock()">
    <label class="labelAba" for="tab3">Visualizar</label>



  </div>
  <div class="tabs">
    <div class="content" id="lista">
      <h2>HOME</h2>
      <div class="card-body table-responsive p-0">
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th style="width: 5%;">Código</th>
              <th >Nome</th>
              <th style="width: 15%;">Contato 1</th>
              <th style="width: 15%;">Contato 2</th>
              <th style="width: 10%;">Data aniversário</th>
              <th style="width: 10%;">Opções</th>
            </tr>
          </thead>
          <tbody class='list'>
          </tbody>
        </table>
        <div class="controls">
          <div class="first">&#171;</div>
          <div class="prev"> &lt; </div>
          <div class="numbers">
            <div>1</div>
          </div>
          <div class="next">></div>
          <div class="last">&#187;</div>
        </div>
      </div>
    </div>
    <div class="content" id="cadastro">
      <h2>SOBRE</h2>
      <div class="container">
        <form class="row" method="POST" id="register">

          <div class="col-md-6">
            <div class="form-group">
              <label for="Nome">Nome completo</label>
              <input type="text" class="form-control form-control-sm" id="Nome" name="Nome">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="Email">E-mail</label>
              <input type="email" class="form-control form-control-sm" id="Email" name="Email">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="CPF">CPF</label>
              <input type="text" class="form-control form-control-sm" id="CPF" name="CPF"
                onkeypress="$(this).mask('000.000.000-00')">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="contato1">Contato 1</label>
              <input type="text" class="form-control form-control-sm" id="contato1" name="contato1"
                onkeypress="$(this).mask('(00) 0 0000-0000')">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="contato2">Contato 2</label>
              <input type="text" class="form-control form-control-sm" id="contato2" name="contato2"
                onkeypress="$(this).mask('(00) 0 0000-0000')">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="dataAnivrsario">Data anivrsário</label>
              <input type="date" class="form-control form-control-sm" id="dataAnivrsario" name="dataAnivrsario">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="salario">Salário</label>
              <input type="text" class="form-control form-control-sm" id="salario" name="salario"
                onkeypress="$(this).mask('#.##0,00', {$reverse})">
            </div>
          </div>
          <div class="col-sm-2">
            <label>Usuário do sistema</label>
            <div class="form-group">
              <div class=" d-inline">
                <input type="radio" value="radioN" name="radio1" id="radioN" checked="" onclick="userSistema()">
                <label>Não</label>
              </div>
              <div class=" d-inline">
                <input type="radio" value="radioS" name="radio1" id="radioS" onclick="userSistema()">
                <label>Sim</label>
              </div>
            </div>
          </div>

          <div class="col-md-3 userSistema">
            <div class="form-group">
              <label for="usuario">Usuario</label>
              <input type="text" class="form-control form-control-sm" id="usuario" name="usuario">
            </div>
          </div>
          <div class="col-md-3 userSistema">
            <div class="form-group">
              <label for="Senha">Senha</label>
              <input type="password" class="form-control form-control-sm" id="Senha" name="Senha" onblur="confirmPassword()">
            </div>
          </div>
          <div class="col-md-3 userSistema">
            <div class="form-group">
              <label for="CSenha">Confirmar senha</label>
              <input type="password" class="form-control form-control-sm" id="CSenha" name="CSenha" onblur="confirmPassword()">
            </div>
          </div>
          <div class="col-md-3 userSistema">
            <div class="form-group">
              <label>Nivel de acesso</label>
              <select class="form-control form-control-sm" name="nivelAcesso">
                <option value="1"></option>
                <option value="1">$C.nomeResponsavel</option>
              </select>
            </div>
          </div>

          <div class="w-100"></div>

          <div class="col-md-4">
            <label>Escolha o(s) tipo(s) de parceiro</label>
          </div>

          <div class="w-100"></div>

          <div class="col-md-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="tipoCliente">
              <label class="form-check-label">Cliente</label>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="tipoFornecedor">
              <label class="form-check-label">Fornecedor</label>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="tipoFuncionario" checked disabled>
              <label class="form-check-label">Funcionário</label>
            </div>
          </div>

          <div class="w-100" style="margin-top: 10px;"></div>

          <div class="col-md-2">
            <div class="form-group">
              <label for="cep">CEP</label>
              <input type="text" class="form-control form-control-sm" id="cep" name="cep"
                onkeypress="$(this).mask('00000-000')" onblur="getViaCep(this.value)">
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group">
              <label for="estado">Estado</label>
              <input type="text" class="form-control form-control-sm" id="estado" name="estado">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="cidade">Cidade</label>
              <input type="text" class="form-control form-control-sm" id="cidade" name="cidade">
            </div>
          </div>
          <div class="col-md-5 ">
            <div class="form-group">
              <label for="bairro">Bairro</label>
              <input type="text" class="form-control form-control-sm" id="bairro" name="bairro">
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group">
              <label for="logradouro">Endereço</label>
              <input type="text" class="form-control form-control-sm" id="logradouro" name="logradouro">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="logradouro">Complemento</label>
              <input type="text" class="form-control form-control-sm" id="complemento" name="complemento">
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group">
              <label for="numero">Número</label>
              <input type="text" class="form-control form-control-sm" id="numero" name="numero">
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <label for="observacao">Observação</label>
              <textarea class="form-control" rows="3" name="observacao"></textarea>
            </div>
          </div>

          <div class="col-md-12" style="text-align: right;">
            <div class='row justify-content-end '>
              <div class="col-md-2">
                <button id="btnSubmit" type="submit" class="btn btn-primary btn-sm" style="width: 100%">Salvar</button>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
    <div class="content" id="visualizar">
      <h2>NOTÍCIAS</h2>
      <div class="container">
        <form class="row" method="POST">

          <div class="col-md-6">
            <div class="form-group">
              <label for="NomeView">Nome completo</label>
              <input type="text" class="form-control form-control-sm" id="NomeView" name="NomeView">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="EmailView">E-mail</label>
              <input type="email" class="form-control form-control-sm" id="EmailView" name="EmailView">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="CPFView">CPF</label>
              <input type="text" class="form-control form-control-sm" id="CPFView" name="CPFView"
                onkeypress="$(this).mask('000.000.000-00')">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="contato1View">Contato 1</label>
              <input type="text" class="form-control form-control-sm" id="contato1View" name="contato1View"
                onkeypress="$(this).mask('(00) 0 0000-0000')">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="contato2View">Contato 2</label>
              <input type="text" class="form-control form-control-sm" id="contato2View" name="contato2View"
                onkeypress="$(this).mask('(00) 0 0000-0000')">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="dataAnivrsarioView">Data anivrsário</label>
              <input type="date" class="form-control form-control-sm" id="dataAnivrsarioView" name="dataAnivrsarioView">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="salarioView">Salário</label>
              <input type="text" class="form-control form-control-sm" id="salarioView" name="salarioView"
                onkeypress="$(this).mask('#.##0,00', {$reverse})">
            </div>
          </div>

          <div class="w-100"></div>

          <div class="col-md-4">
            <label>Escolha o(s) tipo(s) de parceiro</label>
          </div>

          <div class="w-100"></div>

          <div class="col-md-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="tipoClienteView" id="tipoClienteView">
              <label class="form-check-label">Cliente</label>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="tipoFornecedorView" id="tipoFornecedorView">
              <label class="form-check-label">Fornecedor</label>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="tipoFuncionarioView" id="tipoFuncionarioView" checked disabled>
              <label class="form-check-label">Funcionário</label>
            </div>
          </div>

          <div class="w-100" style="margin-top: 10px;"></div>

          <div class="col-md-2">
            <div class="form-group">
              <label for="cepView">CEP</label>
              <input type="text" class="form-control form-control-sm" id="cepView" name="cepView"
                onkeypress="$(this).mask('00000-000')" onblur="getViaCep(this.value)">
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group">
              <label for="estadoView">Estado</label>
              <input type="text" class="form-control form-control-sm" id="estadoView" name="estadoView">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="cidadeView">Cidade</label>
              <input type="text" class="form-control form-control-sm" id="cidadeView" name="cidadeView">
            </div>
          </div>
          <div class="col-md-5 ">
            <div class="form-group">
              <label for="bairroView">Bairro</label>
              <input type="text" class="form-control form-control-sm" id="bairroView" name="bairroView">
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group">
              <label for="logradouroView">Endereço</label>
              <input type="text" class="form-control form-control-sm" id="logradouroView" name="logradouroView">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="complementoView">Complemento</label>
              <input type="text" class="form-control form-control-sm" id="complementoView" name="complementoView">
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group">
              <label for="numeroView">Número</label>
              <input type="text" class="form-control form-control-sm" id="numeroView" name="numeroView">
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <label for="observacaoView">Observação</label>
              <textarea class="form-control" rows="3" name="observacaoView" id="observacaoView"></textarea>
            </div>
          </div>

          <div class="col-md-12" style="text-align: right;">
            <div class='row justify-content-end '>
              <div class="col-md-2">
                <input type="hidden" name="codigoUnicoView" id="codigoUnicoView">
                <button type="submit" class="btn btn-primary btn-sm" style="width: 100%">Salvar</button>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<script src="{$ROTA_TEMA}/js/funcionarios.js"></script>