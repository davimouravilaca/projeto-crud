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

    include "conexao.php";
    $anoAtual = date("Y");

    $id = $_GET['id'] ?? '';
    $sql = "SELECT * FROM pessoa WHERE id = $id";

    $dados = mysqli_query($conn, $sql);

    $linha = mysqli_fetch_assoc($dados);

    ?>
    <div class ="container">
        <div class="row">
            <div class="col">
                <h1>Alteração de Cadastro</h1>
                <form action="edit_script.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nome">Nome completo</label>
                        <input type="text" class="form-control" name="nome" value="<?=$linha['nome']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" name="endereco" value="<?=$linha['endereco']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" name="telefone" value="<?=$linha['telefone']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="<?=$linha['email']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="dt_nascimento">Data de Nascimento</label>
                        <input type="date" class="form-control" name="dt_nascimento" max="<?=$anoAtual.'-12-31'?>" value="<?=$linha['dt_nascimento']?>" required> <br>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" name="foto" accept="jpg"> 
                    </div>
                        <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Salvar Alterações">
                        <a href="pesquisa.php" class="btn btn-primary">Voltar</a>
                    </div>
                    <input type="hidden" name="id" value="<?= $linha['id']?>">
                </form>
            </div>
        </div>
    </div>
</body>
</html>