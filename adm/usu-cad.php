

<?php
require_once 'usuario-verifica.php'; // Verifica se o usuário está logado
// Verifica se o usuário está logado
$usuarioNome = $_SESSION['usuario_logado'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
   
    <style>
        .form-container {
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }
        .btn-custom {
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="topo">
        <div class="container text-center">
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
            <h1 class="text-center"></h1>
            <div class="form-container">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title text-center">Cadastrar Usuário</h3>
                    </div>
                    <div class="card-body">
                        <form action="usuario-gravar.php" method="POST">
                            <div class="mb-3">
                                <label for="inputNomeCompleto" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="inputNomeCompleto" name="nomeCompleto" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputUsuario" class="form-label">Usuário</label>
                                <input type="text" class="form-control" id="inputUsuario" name="usuario" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputSenha" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="inputSenha" name="senha" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputPermissao" class="form-label">Permissão</label>
                                <select id="inputPermissao" class="form-control" name="permissao" required>
                                    <option value="adm">Admin</option>
                                    <option value="usu">Usuário</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <a class="btn btn-secondary btn-custom" href="mensagem-listar.php">Cancelar</a>
                                <button type="submit" class="btn btn-success btn-custom">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div
