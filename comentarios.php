<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Volta ao Mundo - CHINA</title>

    <style>
        .table-custom {
            background-color: #f9f9f9;
            margin: auto;
            /* Centraliza a tabela */
            max-width: 800px;
            /* Define a largura máxima da tabela */
        }

        .table-custom th,
        .table-custom td {
            vertical-align: middle;
            /* Centraliza o conteúdo verticalmente */
        }
    </style>
</head>

<body>
    <div id="topo">
        <div class="container">
            <h1><a href="index.html"><img src="img/Background/logo2.png" width="295" height="300"></a></h1>
            <a href="gastronomia.html" class="btn btn-warning">Gastronomia</a>
            <a href="cultura.html" class="btn btn-warning">Cultura</a>
            <a href="turismo.html" class="btn btn-warning">Pontos Turisticos</a>
            <a href="informacoes.html" class="btn btn-warning">Informações</a>
            <a href="index.html" class="btn btn-warning">Home</a>
            <a href="../VoltaAoMundo-China/adm/adm-login.html" class="btn btn-outline-warning">Administração</a>
            <br><br>

            <!-- Mensagens Aprovadas -->
            <div id="conteudo">
                <div class="row">
                    <div class="col-md-12"><br>
                        <h2 class="text-center">Comentários</h2>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-custom">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Comentário</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once '../VoltaAoMundo-China/classes/Mensagem.php';

                                    $mensagem = new Mensagem();
                                    $comentarios = $mensagem->listarAprovadas();

                                    if (!empty($comentarios)) {
                                        foreach ($comentarios as $comentario) {
                                            echo '<tr>';
                                            echo '<td>' . htmlspecialchars($comentario['nome']) . '</td>';
                                            echo '<td>' . htmlspecialchars($comentario['comentario']) . '</td>';
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="2">Nenhum comentário aprovado encontrado.</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <br><br>
                    </div>
                </div>

                <!-- Formulário de Envio de Mensagem -->
                <div class="row my-3">
                    <div class="col-3">
                    </div>
                 
                    <br><br>
                    <div class="col-6 bg-light p-3">
                    <h2>Envie o seu comentário</h2>
                        <form enctype="multipart/form-data" action="mensagens/mensagem-gravar.php" method="POST">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" name="nome" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                            </div>

                            <div class="mb-3">
                                <label for="comentario" class="form-label">Comentário</label>
                                <textarea class="form-control" name="comentario" id="comentario" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">ENVIAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="rodape">
            <h4 class="text-center">Todos os direitos reservados - Desenvolvido por André Fonseca</h4>
        </div>
    </div>
    <!-- JavaScript (Opcional) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>