<?php 

    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "empresa";

    if ($conn = mysqli_connect($server, $user, $pass, $bd) ) { // realiza e testa a conexão com o banco, retorna verdadeiro ou falso
        //echo "Conectado!";
    } else 
        echo "erro!";
        
    function mensagem($texto, $tipo){
        echo "<div class='alert alert-$tipo' role='alert'>
            $texto
            </div>";
    }

    function mostraData($data) {
        $d = explode("-", $data);
        $escreve = $d[2] . "/" . $d[1] . "/" . $d[0];
        return $escreve;
    }

    function filtroSelecionado($valor) {
        $filtroPesquisa = $_POST['filtro'] ?? 'nome';
        if ($valor == $filtroPesquisa){
        echo "selected";
        }
        }

?>