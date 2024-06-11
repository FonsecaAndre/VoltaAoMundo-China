<?php
// Inclui o arquivo que contém a definição da classe Mensagem
require_once '../classes/Mensagem.php';//*******MUNDANÇA DE CAMINHO*****

// Obtém o valor do parâmetro "id" da URL e armazena em variável
$id = $_GET['id'];

// Cria um novo objeto Turma
$mensagem = new Mensagem($id);

// Chama o método "excluir" do objeto 
$mensagem->excluir();

// Redireciona o usuário para a página "MENSAGEM-listar.php"
header('Location: mensagem-listar.php');
?>