

<?php

require_once '../classes/Mensagem.php'; // Inclui o arquivo que contém a definição da classe Mensagem

// Cria um novo objeto Mensagem
$mensagem = new Mensagem();

// Verifica se os dados foram enviados pelo formulário
if (isset($_POST['nome'], $_POST['email'], $_POST['comentario'])) {
    // Define as propriedades no objeto Mensagem com os valores enviados pelo formulário
    $mensagem->nome = $_POST['nome'];
    $mensagem->email = $_POST['email'];
    $mensagem->comentario = $_POST['comentario'];

    // Chama o método inserir() no objeto Mensagem para inserir os dados no banco de dados
    $mensagem->inserir();
} else {
    echo 'Erro: dados do formulário não foram recebidos.';
}
?>
