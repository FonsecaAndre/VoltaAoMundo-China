<?php

$usuarioInput = $_POST['usuario'];
$senhaInput = $_POST['senha'];

include "../classes/conexao.php";

$sql = "SELECT * FROM tb_usuario WHERE usuario = :usuario";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':usuario', $usuarioInput);
$stmt->execute();

$linha = $stmt->fetch();

if ($linha && password_verify($senhaInput, $linha['senha'])) {
    session_start();
    $_SESSION['usuario_logado'] = $linha['usuario'];
    $_SESSION['permissao'] = $linha['permissao'];

    if ($linha['permissao'] == 'adm') {
        header('Location: index_adm.php');
    } else {
        header('Location: ../mensagens/usu-mensagem-listar.php');
    }
} else {
    header('Location: usuario-erro.php');
}
?>
