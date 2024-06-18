<?php
require_once '../adm/usuario-verifica.php'; // Verifica se o usuário está logado
require_once '../classes/Mensagem.php';

// Verifica se o usuário está logado
$usuarioNome = $_SESSION['usuario_logado'];

// Verifica se o parâmetro 'id' está definido e é numérico
$id = isset($_GET['id']) ? $_GET['id'] : null;
if (!is_numeric($id)) {
    // Pode redirecionar para uma página de erro ou simplesmente mostrar uma mensagem e sair
    echo "ID inválido.";
    exit;
}

// Cria um novo objeto da classe Mensagem passando o valor de $id como parâmetro
$mensagem = new Mensagem($id);

// Variáveis para preenchimento dos campos
$nome = htmlspecialchars($mensagem->nome);
$email = htmlspecialchars($mensagem->email);
$comentario = htmlspecialchars($mensagem->comentario);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Meta tags Obrigatórias -->
   <!-- Meta tags Obrigatórias -->
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

    <title>Editar Mensagem</title>

    <style>
        .table-custom {
            background-color: #f9f9f9;
        }
    </style>

    

    <style>
        .container {
            max-width: 800px; /* Largura máxima do container */
        }
        .card {
            margin-top: 100px;
        }
        .card-header {
            background-color: #007bff;
        }
        .card-title {
            margin-bottom: 0;
        }
        .btn-cancel {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-cancel:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
</head>
<body>
    <div id="topo">
        <div class="container">
            <h1><img src="../img/Background/logo2.png" width="295" height="300"></h1>
                
            <div class="my-1">
                <a href="../mensagens/usu-mensagem-listar.php" class="btn btn-warning">MENSAGENS</a>
                <a href="../mensagens/usu-mensagem-backup.php" class="btn btn-primary">Backup</a>
                <a href="../adm/usuario-logout.php" class="btn btn-light">SAIR</a>
                <br>
            </div>
            <br>           
            <div class="d-flex align-items-center">
                <span class="mr-3"><h3>Bem-vindo, <?php echo htmlspecialchars($usuarioNome); ?></span></h3>
            </div>             
        </div>
    </div>
    <br> 

    <div class="container my-5">
        <h1></h1>
        <br>
            
        <div class="card">
            <div class="card-header text-white">
                <h3 class="card-title">Editar Mensagem</h3>
            </div>
            <div class="card-body">
                <form action="mensagem-editar-gravar.php" method="POST">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($mensagem->id) ?>">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input class="form-control" type="text" name="nome" value="<?= $nome ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control" type="email" name="email" value="<?= $email ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="comentario">Comentário:</label>
                        <textarea class="form-control" name="comentario" rows="4" required><?= $comentario ?></textarea>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-cancel mr-2" href="../mensagens/usu-mensagem-listar.php">Cancelar</a>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="rodape" class="text-center mt-5">
        <h4>Todos os direitos reservados - Desenvolvido por André Fonseca</h4>
    </div>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
