<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Cadastro</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class ="container">
        <div class="row">
        <?php
            include "conexao.php";
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $dt_nascimento = $_POST['dt_nascimento'];

            $sql = "UPDATE `pessoa` set `nome` = '$nome', `endereco` = '$endereco', `telefone` = '$telefone', `email` = '$email', `dt_nascimento` = '$dt_nascimento' WHERE id = $id";

            if (mysqli_query($conn, $sql)) {
                mensagem("$nome alterado com sucesso!", 'success');
            } else {
                mensagem("$nome NÃO foi alterado", 'danger');
            }
            ?>
            <a href="index.html" class="btn-primary">Voltar</a>

        </div>
    </div>
</body>
</html>