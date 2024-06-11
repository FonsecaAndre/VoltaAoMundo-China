<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/color-modes.js"></script>

    <title>Administrativo</title>
</head>

<body>
    <!-- Cabecalho pagina -->
    <session>
        <header class="d-block p-5 text-bg-primary">
            <div class="container">
                <div class="d-flex ">
                    <!-- Titulo página -->
                    <div class="col-sm-6">
                        <h3>Administrativo - Painel de controle</h3>
                    </div>

                    <!-- Navbar -->
                    <div class="col-sm-4">
                        <ul class="nav me-lg-auto mb-2 justify-content-center mb-md-0">
                            <li><a href="mensagem-listar.php" class="nav-link px-3 text-white">Comentarios</a></li>
                            <!--*******MUNDANÇA DE CAMINHO*****-->

                            <li><a href="../disciplinas/disciplina-listar.php" class="nav-link px-3 text-white">Disciplinas</a></li>
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
                        NOVA TURMA
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
                    <form action="turmas-gravar.php" method="post">
                        <div class="mb-3">
                            <label for="descTurma" class="form-label">Turma:</label>
                            <input type="text" name="descTurma" id="descTurma" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="ano" class="form-label">Ano:</label>
                            <?php
                                echo '<select class="form-control" name="ano" data-component="date">';
                                for ($year = date('Y'); $year >= 1900; $year--) {
                                    echo '<option value="' . $year . '">' . $year . '</option>';
                                }
                                echo '</select>';
                            ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">ADICIONAR</button>
                    </form>
                </div>
                <div class="col-3"></div>

            </div>
        </div>
</body>

</html>