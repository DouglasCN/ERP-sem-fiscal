<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema body</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{$ROTA_TEMA}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{$ROTA_TEMA}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{$ROTA_TEMA}/css/index.css">
</head>

<body>

    {php}
    if(Rotas::get_Pagina() == 0){

    }else{

    {/php}

    <!-- inicia a parte principal do site -->
    <div class="panel-login">
        <div class="label-login">
            <div class="login">
                <span>Login</span>
                <div class="border"></div>
            </div>
        </div>
        <div class="panel">
            <form method="post">
                <label for="user">Seu usário</label>
                <input type="text" name="user" class="input-login">
                <label for="pass">Sua senha</label>
                <input type="password" name="pass" class="input-login">
                <input type="submit" value="Entrar" class="input-submit">
            </form>
        </div>
        <div class="label-contact">
            <a href=""><span>Entre em contato conosco clicando aqui.</span></a>
        </div>
    </div>
    <!-- finaliza a parte principal do site -->
    </div>
    {php}
    }
    {/php}

</body>
<script src="{$ROTA_TEMA}/plugins/jquery/jquery.min.js"></script>

<script src="{$ROTA_TEMA}/dist/js/adminlte.js"></script>

</html>