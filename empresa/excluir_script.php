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

            if (mysqli_query($conn, $sql)) {
                mensagem("$nome excluido com sucesso!", 'success');
            } else {
                mensagem("$nome NÃO foi excluido", 'danger');
            }
            ?>
            <a href="pesquisa.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</body>
</html>