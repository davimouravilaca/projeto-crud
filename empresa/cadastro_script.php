<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css\style.css">
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

            $foto = $_FILES['foto'];
            //atributos do vetor FILES:
            $nome_foto = mover_foto($foto);

            // Correção na construção da consulta SQL, utilizando aspas simples para delimitar os valores e adicionando o cifrão ($) na variável $dt_nascimento.
            $sql = "INSERT INTO `pessoa` (`nome`, `endereco`, `telefone`, `email`, `dt_nascimento`, `foto`) VALUES ('$nome', '$endereco', '$telefone', '$email', '$dt_nascimento', '$nome_foto')";

            if (mysqli_query($conn, $sql)) {
                echo "<img src='img/$nome_foto' title='$nome_foto' class='mostra_foto'>";
                mensagem("$nome cadastrado com sucesso!", 'success');
            } else {
                mensagem("$nome NÃO foi cadastrado", 'danger');
            }
            ?>
            <a href="index.html" class="btn btn-primary">Voltar ao inicio</a>

        </div>
    </div>
</body>
</html>