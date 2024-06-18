<?php
require_once '../classes/Usuario.php'; // Caminho da classe Usuario
require_once '../adm/usuario-verifica.php'; // Verifica se o usuário está logado

// Verifica se o parâmetro 'id' está definido e é numérico
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
if ($id === null || $id <= 0) {
    // Pode redirecionar para uma página de erro ou simplesmente mostrar uma mensagem e sair
    echo "ID inválido.";
    exit;
}

// Cria um novo objeto da classe Usuario passando o valor de $id como parâmetro
$usuario = new Usuario($id);

// Chama o método "excluir" do objeto Usuario
$usuario->excluir();

// Redireciona o usuário de volta para a página "usuario-listar.php"
header('Location: usuario-listar.php');
?>
