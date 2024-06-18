<?php
require_once "../classes/conexao.php";
require_once "../classes/Mensagem.php";

// Instancia a classe Mensagem para acessar o método listar()
$mensagem = new Mensagem();
$mensagens = $mensagem->listar();

// Define o tipo de conteúdo para JSON
header('Content-Type: application/json');
// Define o cabeçalho para download
header('Content-Disposition: attachment; filename="mensagens.json"');

// Converte os dados em formato JSON
echo json_encode($mensagens, JSON_PRETTY_PRINT);

exit;
?>
