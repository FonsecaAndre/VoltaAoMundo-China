<?php
// Inclui o arquivo que contém a definição da classe Usuario
require_once "../classes/Usuario.php";

// Cria um novo objeto Usuario utilizando o id do objeto como referência
$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

if ($id > 0) {
    $usuario = new Usuario($id);

    // Sanitiza e valida os dados de entrada
    $nomeCompleto = filter_input(INPUT_POST, 'nomeCompleto', FILTER_SANITIZE_STRING);
    $usuarioNome = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $permissao = filter_input(INPUT_POST, 'permissao', FILTER_SANITIZE_STRING);

    // Verifica se todos os campos obrigatórios foram preenchidos
    if ($nomeCompleto && $usuarioNome && $senha && $permissao) {
        // Atualiza as propriedades do objeto Usuario
        $usuario->nomeCompleto = $nomeCompleto;
        $usuario->usuario = $usuarioNome;
        $usuario->senha = password_hash($senha, PASSWORD_BCRYPT); // Hash da senha
        $usuario->permissao = $permissao;

        // Chama o método atualizar() no objeto Usuario
        $usuario->atualizar();

        // Redireciona para a página de listagem de usuários
        header('Location: usuario-listar.php');
        exit;
    } else {
        // Redireciona para a página de edição com uma mensagem de erro
        header('Location: usuario-editar.php?id=' . $id . '&erro=Dados inválidos');
        exit;
    }
} else {
    // Redireciona para a página de listagem com uma mensagem de erro
    header('Location: usuario-listar.php?erro=ID inválido');
    exit;
}
?>
