<?php
// Inclui o arquivo que contém a definição da classe Mensagem
require_once "../classes/Mensagem.php";/*******MUNDANÇA DE CAMINHO*****/

// Cria um novo objeto Mensagem utilizando o id do objeto como referência
$id = $_POST['id'];
$mensagem = new Mensagem($id);


$mensagem->nome = $_POST['nome'];
$mensagem->email = $_POST['email'];
$mensagem->comentario = $_POST['comentario'];


// Chama o método atualizar() no objeto Mensagem
$mensagem->atualizar();

// Redireciona a página para a listagem de turmas
header('Location: mensagem-listar.php');
?>