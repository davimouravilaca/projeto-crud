<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class ="container">
        <div class="row">
        <?php
            include "conexao.php";

            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $dt_nascimento = $_POST['dt_nascimento'];

            // Correção na construção da consulta SQL, utilizando aspas simples para delimitar os valores e adicionando o cifrão ($) na variável $dt_nascimento.
            $sql = "INSERT INTO `pessoa` (`nome`, `endereco`, `telefone`, `email`, `dt_nascimento`) VALUES ('$nome', '$endereco', '$telefone', '$email', '$dt_nascimento')";

            if (mysqli_query($conn, $sql)) {
                echo "$nome cadastrado com sucesso";
            } else {
                echo "$nome NÃO foi cadastrado";
            }
            ?>

        </div>
    </div>
</body>
</html>