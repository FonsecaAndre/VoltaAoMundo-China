<?php
// Inclui o arquivo que contém a definição da classe Usuario
require_once "../classes/Usuario.php";
require_once '../adm/usuario-verifica.php'; // Verifica se o usuário está logado


// Verifica se o parâmetro 'id' está definido e é numérico
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
if ($id === null || $id <= 0) {
    // Redireciona para uma página de erro ou simplesmente mostra uma mensagem e sai
    echo "ID inválido.";
    exit;
}

// Cria um novo objeto da classe Usuario passando o valor de $id como parâmetro
$usuario = new Usuario($id);
$usuarioNome = $_SESSION['usuario_logado']; // Supondo que o nome do usuário logado esteja armazenado na sessão
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

    <title>Volta ao Mundo - CHINA - ADMINISTRATIVO</title>

    <style>
        .table-custom {
            background-color: #f9f9f9;
        }
        .form-container {
            max-width: 700px;
            margin: auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div id="topo">
        <div class="container">
            <h1 class="display-1"><img src="../img/Background/logo2.png" width="295" height="300"></h1>

            <a href="../mensagens/mensagem-listar.php" class="btn btn-warning">MENSAGENS</a>
            <a href="usuario-listar.php" class="btn btn-warning">USUÁRIOS</a>
            <a href="../adm/usuario-logout.php" class="btn btn-light">SAIR</a>
            <br><br>
            <div class="d-flex align-items-center">
                <span class="mr-3"><h3>Bem-vindo, <?php echo htmlspecialchars($usuarioNome); ?></span></h3>
            </div>
        </div>
        <br>

        <div class="container my-5">
            <h1></h1>
            <div class="form-container">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Editar Usuário</h3>
                    </div>
                    <div class="card-body">
                        <form action="usuario-editar-gravar.php" method="POST">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($usuario->id) ?>">
                            <div class="mb-3">
                                <label for="nomeCompleto" class="form-label">Nome Completo:</label>
                                <input class="form-control" type="text" name="nomeCompleto" value="<?= htmlspecialchars($usuario->nomeCompleto) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Usuário:</label>
                                <input class="form-control" type="text" name="usuario" value="<?= htmlspecialchars($usuario->usuario) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha:</label>
                                <input class="form-control" type="password" name="senha" required>
                            </div>
                            <div class="mb-3">
                                <label for="permissao" class="form-label">Permissão:</label>
                                <select class="form-control" name="permissao" required>
                                    <option value="adm" <?= $usuario->permissao == 'adm' ? 'selected' : '' ?>>Admin</option>
                                    <option value="usuario" <?= $usuario->permissao == 'usuario' ? 'selected' : '' ?>>Usuário</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-secondary" href="usuario-listar.php">Cancelar</a>
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="rodape">
            <h4>Todos os direitos reservados - Desenvolvido por André Fonseca</h4>
        </div>
    </div>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
