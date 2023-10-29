<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Cadastro</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class ="container">
        <div class="row">
        <?php
            include "conexao.php";
            $id = $_POST['id'];
            $nome = $_POST['nome'];

            $sql = "DELETE FROM `pessoa` WHERE id = $id";

            $resultado = mysqli_query($conn, $sql);
            mensagem($resultado ? "$nome excluído com sucesso!" : "$nome NÃO foi excluído", $resultado ? 'success' : 'danger');
        ?>
            <a href="pesquisa.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</body>
</html>