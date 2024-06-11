

<?php

//Inclui o arquivo que contem a definição da clasee Turma
require_once "../classes/Mensagem.php"; //*******MUNDANÇA DE CAMINHO*****

//Cria um novo objeto Turma
$mensagem = new Mensagem();

/** Define as propriedades descTurma e ano no objeto Turma
 * com os valores enc=viados pelo formulário */
$mensagem->nome = $_POST['nome'];
$mensagem->email = $_POST['email'];
$mensagem->comentario = $_POST['comentario'];

/**Chama o método inserir() no objeto Turma para inserir
 * os dados na nova turma no banco dados */
$mensagem->inserir();
