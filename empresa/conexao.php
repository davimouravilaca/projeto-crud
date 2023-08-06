<?php 
    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "empresa";

    if ($conn = mysqli_connect($server, $user, $pass, $bd) ) { // realiza e testa a conexão com o banco, retorna verdadeiro ou falso
        echo "Conectado!";
    } else 
        echo "erro!" 
?>