<?php
// Inclui o arquivo que contém a definição da classe Mensagem
require_once "../classes/Mensagem.php"; //*******MUNDANÇA DE CAMINHO*****

// Obtém o valor do parâmetro "id" passado na URL via método GET
$id = $_GET['id'];

// Cria um novo objeto da classe Turma passando o valor de $id como parâmetro
$mensagem = new Mensagem($id);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/color-modes.js"></script>

    <title>Administração</title>
</head>

<body>
    <!-- Cabecalho pagina -->
    <session>
        <header class="d-block p-5 text-bg-primary">
            <div class="container">
                <div class="d-flex ">
                    <!-- Titulo página -->
                    <div class="col-sm-6">
                        <h3>Administração - Painel de controle</h3>
                    </div>

                    <!-- Navbar -->
                    <div class="col-sm-4">
                        <ul class="nav me-lg-auto mb-2 justify-content-center mb-md-0">
                            <li><a href="../mensagens/mensagem-listar.php" class="nav-link px-3 text-white">Mensagens</a></li>
                            <!--*******MUNDANÇA DE CAMINHO*****-->
                            <li><a href="#" class="nav-link px-3 text-white">Administrador</a></li>
                            <!--*******MUNDANÇA DE CAMINHO*****-->                            
                        </ul>
                    </div>

                    <!-- Botao login -->
                    <div class="d-grid gap-2 col-1 mx-auto">
                        <a href="../usuario-logout.php" type="button" class="btn btn-light">
                            SAIR
                        </a>
                    </div>
                </div>
            </div>
        </header>
    </session>
    <div class="container">

        <div class="my-5">
            <div class="row justify-content-between">
                <div class="col-4">
                    <h3>
                        EDITAR MENSAGEM
                    </h3>
                </div>
                <div class="col-2 position-absolute end-0">
                    <a class="btn btn-danger" href="mensagem-listar.php" role="button">
                        CANCELAR
                    </a>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-3"></div>
                <div class="col-6 bg-light p-3">
                    <form action="mensagem-editar-gravar.php" method="POST">
                        <input type="hidden" name="id" value="<?= $mensagem->id ?>">
                        <label for="nome" class="form-label">Nome:</label>
                        <input class="form-control" type="text" name="nome" value="<?= $mensagem->nome ?>">
                        <br><br>
                        <label for="email" class="form-label">Email:</label>
                        <input class="form-control" type="text" name="email" value="<?= $mensagem->email ?>">
                        <br><br>
                        <label for="comentario" class="form-label">Comentario:</label>
                        <input class="form-control" type="text" name="comentario" value="<?= $mensagem->comentario ?>">
                        <br><br>
                        <button type="submit" class="btn btn-primary btn-block">SALVAR</button>
                    </form>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
</body>

</html>