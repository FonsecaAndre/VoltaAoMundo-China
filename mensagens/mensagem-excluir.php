<?php
require_once '../classes/Mensagem.php'; // Caminho da classe Mensagem
require_once '../adm/usuario-verifica.php'; // Verifica se o usuário está logado

// Verifica se o parâmetro 'id' está definido na URL e é numérico
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    // Pode redirecionar para uma página de erro ou simplesmente mostrar uma mensagem e sair
    echo "ID inválido.";
    exit;
}

// Obtém o valor do parâmetro "id" da URL e armazena em variável (após validar que é numérico)
$id = (int)$_GET['id'];

// Cria um novo objeto da classe Mensagem passando o valor de $id como parâmetro
$mensagem = new Mensagem($id);

// Chama o método "excluir" do objeto Mensagem
$mensagem->excluir();

// Redireciona o usuário de volta para a página "mensagem-listar.php"
header('Location: mensagem-listar.php');
?>
