<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <?php 
    $anoAtual = date("Y");
    ?>
    <div class ="container">
        <div class="row">
            <div class="col">
                <h1>Cadastro</h1>
                <form action="cadastro_script.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nome">Nome completo</label>
                        <input type="text" class="form-control" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" name="endereco">
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" name="telefone">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="dt_nascimento">Data de Nascimento</label>
                        <input type="date" class="form-control" name="dt_nascimento" max="<?=$anoAtual.'-12-31'?>"> 
                        <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" name="foto" accept="jpg">
                        <br>
                    </div>
                        <br>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success">
                        <a href="index.html" class="btn btn-primary">Voltar para o início</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>