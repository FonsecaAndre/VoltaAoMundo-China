<?php
require_once '../adm/usuario-verifica.php';
require_once '../classes/Usuario.php';

$usuario = new Usuario();
$lista = $usuario->listar();

$usuarioNome = $_SESSION['usuario_logado']; // Alterado para 'usuario_logado' pois é o índice correto da sessão

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

    <title>Painel Administrativo - Usuários</title>

    <style>
        .table-custom {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div id="topo">
        <div class="container">
            <h1 class="display-1"><img src="../img/Background/logo2.png" width="295" height="300"></h1>

            <a href="../mensagens/mensagem-listar.php" class="btn btn-warning">MENSAGENS</a>
            <a href="usu-cad.php" class="btn btn-primary">Cadastrar</a>
            <a href="../adm/usuario-logout.php" class="btn btn-light">SAIR</a>
            <br><br>
            <div class="d-flex align-items-center">
                <span class="mr-3"><h3>Bem-vindo, <?php echo htmlspecialchars($usuarioNome); ?></span></h3>
            </div>
        </div>
        <br>

        <div class="container my-5">
            <h1>Listar Usuários</h1>
            
            <table class="table table-striped table-custom">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome Completo</th>
                        <th>Usuário</th>
                        <th>Permissão</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($lista)) : ?>
                        <?php foreach ($lista as $linha) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($linha['Id']); ?></td>
                                <td><?php echo htmlspecialchars($linha['nomeCompleto']); ?></td>
                                <td><?php echo htmlspecialchars($linha['usuario']); ?></td>
                                <td><?php echo htmlspecialchars($linha['permissao']); ?></td>
                                <td>
                                    <a href="usuario-editar.php?id=<?= $linha['Id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="usuario-excluir.php?id=<?= $linha['Id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5">Nenhum registro encontrado</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
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
