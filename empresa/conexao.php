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
        if ($data != null){
        $d = explode("-", $data);
        $escreve = $d[2] . "/" . $d[1] . "/" . $d[0];
        return $escreve;
        } 
    }

    function filtroSelecionado($valor) {
        $filtroPesquisa = $_POST['filtro'] ?? 'nome';
        if ($valor == $filtroPesquisa){
        echo "selected";
        }
        }

        function mover_foto($vetor_foto) {
            $vtipo = explode('/', $vetor_foto['type']);
            $tipo = $vtipo[0] ?? '';
            $extensao = "." . $vtipo[1];
            if (!$vetor_foto['error'] && ($vetor_foto['size'] <= 500000) && ($tipo == "image")) {
                $nome_foto = md5(date("Ymdhms") . "sorrizoronaldo") . $extensao;
                $caminho_destino = "img/" . $nome_foto;
        
                if (move_uploaded_file($vetor_foto['tmp_name'], $caminho_destino)) {
                    return $nome_foto;
                } else {
                    // Erro ao mover o arquivo
                    return false;
                }
            } else {
                // Erro na foto (tamanho ou upload)
                return false;
            }
        }        
?>