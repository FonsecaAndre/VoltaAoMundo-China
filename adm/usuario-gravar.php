<?php

require_once "../classes/Usuario.php";

// Verifica se os campos estão definidos e não estão vazios
if (!empty($_POST["nomeCompleto"]) && !empty($_POST["usuario"]) && !empty($_POST["senha"]) && !empty($_POST["permissao"])) {
    $usuario = new Usuario();

    // Atribui os valores dos campos aos atributos do objeto Usuario
    $usuario->nomeCompleto = $_POST["nomeCompleto"];
    $usuario->usuario = $_POST["usuario"];
    $usuario->senha = $_POST["senha"]; // A senha será hash na classe Usuario
    $usuario->permissao = $_POST["permissao"];

    // Tenta inserir o novo usuário
    try {
        $usuario->inserir();
    } catch (Exception $e) {
        echo "
        <script type='text/javascript'>
            alert('Erro ao gravar usuário: " . $e->getMessage() . "');
            window.history.back();
        </script>
        ";
    }
} else {
    echo "
    <script type='text/javascript'>
        alert('Todos os campos são obrigatórios.');
        window.history.back();
    </script>
    ";
}
?>
