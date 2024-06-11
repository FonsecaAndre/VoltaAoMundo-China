<?php
//Verifica se o usuário está logado
require_once '../adm/usuario-verifica.php'; //*******MUNDANÇA DE CAMINHO*****
// Inclui o arquivo que contém a classe Mensagem
require_once "../classes/Mensagem.php"; //*******MUNDANÇA DE CAMINHO*****

// Cria um novo objeto mensagem
$mensagem = new Mensagem();

// Chama o método "listar" e armazena o resultado em uma variável
$lista = $mensagem->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="../js/color-modes.js"></script>
    <script src="../js/color-modes.js"></script>


    <title>PÁGINA ADMINISTRATIVA</title>
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
                            <li><a href="../mensagens/mensagem-listar.php" class="nav-link px-3 text-white">Mensagens</a></li><!--*******MUNDANÇA DE CAMINHO*****-->
                            <li><a href="#" class="nav-link px-3 text-white">Usuários</a></li><!--*******MUNDANÇA DE CAMINHO*****-->
                            
                        </ul>
                    </div>

                    <!-- Botao login -->
                    <div class="d-grid gap-2 col-1 mx-auto">
                        <a href="../adm/usuario-logout.php" type="button" class="btn btn-light">
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
                        Listar Mensagem
                    </h3>
                </div>
                <div class="col-2 position-absolute end-0">
                    <a class="btn btn-primary" href="mensagens-inserir.php" role="button">
                        NOVA MENSAGEMS
                    </a>
                </div>
            </div>


            <table class="table table-striped">
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Comentario</th>
                    <th>Ações</th>
                </tr>
                <?php foreach ($lista as $linha) : ?>
                    <tr>
                        <td><?php echo $linha['id'] ?></td>
                        <td><?php echo $linha['nome'] ?></td>
                        <td><?php echo $linha['email'] ?></td>
                        <td><?php echo $linha['comentario'] ?></td>
                        <td>
                            <a href="mensagem-editar.php?id=<?= $linha['id'] ?>">
                                <span class="material-symbols-outlined">
                                    edit_square
                                </span>
                            </a>
                            <a href="mensagem-excluir.php?id=<?= $linha['id'] ?>">
                                <span class="material-symbols-outlined text-danger">
                                    delete_forever
                                </span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>

        </div>
    </div>
</body>

</html>