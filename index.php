<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa</title>
    <link rel="stylesheet" href="restrito/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1 class="display-4">Cadastro WEB - Login</h1>
                    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <div class="form-group">
                            <label for="login">Email</label>
                            <input type="text" class="form-control" name="login" aria-describedby="emailHelp" placeholder="Digite seu login">
                            <small name="login" class="form-text text-muted">Entrar com credenciais de acesso.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control" name="senha" placeholder="Digite sua senha">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Acessar</button>
                    </form>
                    <?php
                    if (isset($_POST['login'])){
                        $login = $_POST['login'];
                        $senha = $_POST['senha'];
                        if($login == "admin" and ($senha == "admin")){
                            header("location: restrito");}
                        else {
                            echo "login invalido";}
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>




