<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <?php 

        if (isset($_POST['busca'])) {
            $pesquisa = $_POST['busca'];}
        else {
            $pesquisa = '';
        }

        include "conexao.php";

        $sql = "SELECT * FROM pessoa WHERE nome LIKE '%$pesquisa%'";
        
        $dados = mysqli_query($conn, $sql);

    ?>


    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pesquisa</h1>
                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                        <form class="d-flex" action="<?=$_SERVER['PHP_SELF']?>" method="post" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="busca" autofocus>
                            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                        <?php 
                        $busca = $_POST['busca'] ?? '';
                        if ($busca != ''){                        
                        echo "<button class='btn btn-outline-danger' type='submit'> X </button>";
                        }
                        ?>
                        </form>
                    </div>
                </nav> 
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Data de Nascimento</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    while ($linha = mysqli_fetch_assoc($dados) ) {
                        $id = $linha['id'];
                        $nome = $linha['nome'];
                        $endereco = $linha['endereco'];
                        $telefone = $linha['telefone'];
                        $email = $linha['email'];
                        $dt_nascimento = $linha['dt_nascimento'];
                    
                    echo   "<tr>
                            <th scope='row'>$id</th>
                            <td>$nome</td>
                            <td>$endereco</td>
                            <td>$telefone</td>
                            <td>$email</td>
                            <td>$dt_nascimento</td>
                        </tr>";
                    }
                    ?>
                    </tbody>
                </table>
                <a href="index.html" class="btn btn-primary">Voltar para o início</a>
            </div>
        </div>
    </div>
</body>
</html>
