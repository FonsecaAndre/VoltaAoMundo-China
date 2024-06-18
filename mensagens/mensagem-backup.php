<?php
require_once '../adm/usuario-verifica.php';
require_once '../classes/Usuario.php';

$usuario = new Usuario();
$lista = $usuario->listar();

$usuarioNome = $_SESSION['usuario_logado']; // Supondo que este método retorna o nome do usuário logado

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

    <title>Volta ao Mundo - CHINA</title>

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
            <a href="../adm/usuario-listar.php" class="btn btn-warning">USUÁRIOS</a>
            <a href="../adm/usuario-logout.php" class="btn btn-light">SAIR</a>
            <br>
            <div class="d-flex align-items-center">
                <span class="mr-3"><h3>Bem-vindo, <?php echo htmlspecialchars($usuarioNome); ?></span></h3>
            </div>
        </div>
        <br>

        <div class="container my-5">
           
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Upload de Arquivo JSON</h3>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" action="mensagem-inserir-processa.php" method="POST">
                        <div class="mb-3">
                            <label for="json_file" class="form-label">Selecione um arquivo JSON para upload</label>
                            <input type="file" class="form-control" name="json_file" id="json_file" accept=".json" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a class="btn btn-secondary" href="mensagem-listar.php">Cancelar</a>
                            <button type="submit" class="btn btn-success" name="submit_json">Enviar JSON</button>
                            <a class="btn btn-primary" href="mensagem-download-json.php">Download JSON</a>
                        </div>
                    </form>
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
