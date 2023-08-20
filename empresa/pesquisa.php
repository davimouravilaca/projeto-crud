<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php //puxar dados do mysql

    if (isset($_POST['busca'])) {
        $pesquisa = $_POST['busca'];
    } else {
        $pesquisa = '';
    }

    include "conexao.php";

    $filtroPesquisa = $_POST['filtro'] ?? 'nome';

    $sql = "SELECT * FROM pessoa WHERE $filtroPesquisa LIKE '%$pesquisa%'";
    
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

                        <!-- Filtros de pesquisa-->                            
                        <select name='filtro' class='form-select' aria-label='Default select example' style='max-width: 120px;'>
                            <option value='nome'<?=filtroSelecionado('nome')?>>Nome</option>
                            <option value='endereco'<?=filtroSelecionado('endereco')?>>Endereço</option>
                            <option value='email'<?=filtroSelecionado('email')?>>Email</option>
                        </select>  
                    
                        <!--Botão de X-->
                        <?php 
                            $busca = $_POST['busca'] ?? '';
                            if ($busca != '') {
                                echo "<form class='d-flex' action='" . $_SERVER['PHP_SELF'] . "' method='post' role='search'>";
                                echo "<button class='btn btn-outline-danger' type='submit' name='busca' value=''> X </button></form>";
                            }
                        ?>
                    </form>
                </div>
            </nav>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col"></th>
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
                    $dt_nascimento = mostraData($dt_nascimento);
                    $foto = $linha['foto'];
                    echo   "<tr>
                            <td><img src='img/$foto' class='lista_foto'></td>
                            <th scope='row'>$nome</th>
                            <td>$endereco</td>
                            <td>$telefone</td>
                            <td>$email</td>
                            <td>$dt_nascimento</td>
                            <td>
                                <a href='cadastro_edit.php?id=$id' class='btn btn-success btn-sm'>Editar&#9999;</a>
                                <a href='#confirma' type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirma' onclick=" .'"' . "getData($id, '$nome')" . '"' .">Excluir&#10060;</a>                  
                            </td>
                        </tr>";
                }
                ?>
                        <!-- O SEGREDO ESTÁ AQUI-->

                </tbody>
            </table>
            <a href="index.html" class="btn btn-primary">Voltar para o início</a>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar Exclusão</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">   
                <form action="excluir_script.php" method="post">         
                    <p>Você deseja mesmo excluir <strong id="nome">Nome da pessoa</strong>? (Esta ação não pode ser desfeita).</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                <input type="hidden" name="id" id="id" value="">
                <input type="hidden" name="nome" id="nome1" value="">
                <input type="submit" class="btn btn-danger" value='Sim'>
                </form>    
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function getData(id, nome) {
        document.getElementById('nome').innerHTML = nome;
        document.getElementById('id').value = id;
        document.getElementById('nome1').value = nome;
    }
</script>


<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
