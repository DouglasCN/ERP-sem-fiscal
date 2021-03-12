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
                <th style="width: 30%;">Nome da empresa (Instagram)</th>
                <th style="width: 25%;">Razão social</th>
                <th style="width: 25%;">E-mail</th>
                <th style="width: 10%;">Contato</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="text-align: right;">$C.idCliente</td>
                <td>$C.nomeFantasia</td>
                <td>$C.razaoSocial</td>
                <td>$C.email</td>
                <td>$C.contato</span></td>

              </tr>
              <tr>
                <td style="text-align: right;">$C.idCliente</td>
                <td>$C.nomeFantasia</td>
                <td>$C.razaoSocial</td>
                <td>$C.email</td>
                <td>$C.contato</span></td>

              </tr>
            </tbody>
          </table>
          <ul class="pagination justify-content-center"
            style="margin-top: 8px; padding-top: 8px; border-top: 1px solid rgba(0,0,0,.125);">
            <li class="page-item"><a class="page-link" href="?p=1'.$filtros.'" style="border-radius: 100px;">
                << Primeiro </a>
            </li>
            <li class="page-item"><a class="page-link" href="?p='.$p.''.$filtros.'" style="border-radius: 100px;">
                '.$p.' </a></li>
            <li class="page-item"><a class="page-link" href="?p='. $this->totalpags .''.$filtros.'"
                style="border-radius: 100px;"> Ultimo >></a></li>
          </ul>
        </div>
      </div>

      <div class="content" id="cadastro">
        <h2>SOBRE</h2>
        <div class="container">
          <form class="row" method="POST">

            <div class="col-md-6">
              <div class="form-group">
                <label for="Nome">Nome completo</label>
                <input type="text" class="form-control form-control-sm" id="Nome" name="Nome">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="Email">E-mail</label>
                <input type="text" class="form-control form-control-sm" id="Email" name="Email">
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
                <input type="text" class="form-control form-control-sm" id="Senha" name="Senha">
              </div>
            </div>
            <div class="col-md-3 userSistema">
              <div class="form-group">
                <label for="CSenha">Confirmar senha</label>
                <input type="text" class="form-control form-control-sm" id="CSenha" name="CSenha">
              </div>
            </div>
            <div class="col-md-3 userSistema">
              <div class="form-group">
                <label>Nivel de acesso</label>
                <select class="form-control form-control-sm" name="nivelAcesso">
                  <option value="0"></option>
                  <option value="$C.idClient">$C.nomeResponsavel</option>
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
                  <button type="submit" class="btn btn-primary btn-sm" style="width: 100%">Salvar</button>
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
                <label for="Nome">Nome completo</label>
                <input type="text" class="form-control form-control-sm" id="Nome" name="Nome">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="Email">E-mail</label>
                <input type="text" class="form-control form-control-sm" id="Email" name="Email">
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
                <input type="text" class="form-control form-control-sm" id="Senha" name="Senha">
              </div>
            </div>
            <div class="col-md-3 userSistema">
              <div class="form-group">
                <label for="CSenha">Confirmar senha</label>
                <input type="text" class="form-control form-control-sm" id="CSenha" name="CSenha">
              </div>
            </div>
            <div class="col-md-3 userSistema">
              <div class="form-group">
                <label>Nivel de acesso</label>
                <select class="form-control form-control-sm" name="nivelAcesso">
                  <option value="0"></option>
                  <option value="$C.idClient">$C.nomeResponsavel</option>
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