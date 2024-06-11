<?php

class Mensagem

{

    public $id;

    public $nome;

    public $email;

    public $comentario;

    // define um método construtor na classe e recebe um parâmetro opcional $id
    public function __construct($id = false)
    {
        // verifica se a variável $id foi definida
        if ($id) {
            // atribui o valor de $id à propriedade $id do objeto
            $this->id = $id;
            // chama o método carregar() para carregar as informações correspondente ao id
            $this->carregar();
        }
    }


    public function inserir()
    {


        //Define a string SQL de inserção de dados na tabela "tb_mensagem"
        $sql = "INSERT INTO tb_mensagem (nome, email, comentario) VALUES (
                 '{$this->nome}',
                    '{$this->email}',
                    '{$this->comentario}'
                    )";

        //Cria uma nova conexão PDO com o banco de dados "volta_ao_mundo_china"
        include "../classes/conexao.php";
        /*******MUNDANÇA DE CAMINHO*****/

        //Executa a string SQL na conexão, inserindo os dados na tabela "tb_mensagem"
        $conexao->exec($sql);

        echo "
        <script type='text/javascript'>
            alert('Comentário enviado com sucesso');
            setTimeout(function() {
                window.location.href = '../contato.html';
            }, 1000); // 1000 milissegundos = 1 segundo
        </script>
        ";
    }

    public function listar()
    {
        //Define a string SQL para selecionar os registros de tabela
        $sql = "SELECT * FROM tb_mensagem";

        //Cria uma nova conexão PDO com o banco de dados "volta_ao_mundo_china"
        include "conexao.php";
        /*******MUNDANÇA DE CAMINHO*****/

        //Executa a string SQL na conexão, retornando um objeto de resultado
        $resultado = $conexao->query($sql);

        //Extrai todos os registros do objeto e coloca-os em um array
        $lista = $resultado->fetchAll();

        //Retorna o array contendo todos os registros da tabela "tb_aluno"
        return $lista;
    }

    public function excluir()
    {
        // Define a string de consulta SQL para deletar um registro
        // da tabela "tb_turmas" com base no seu ID
        $sql = "DELETE FROM tb_mensagem WHERE id=" . $this->id;

        // Cria uma nova conexão PDO com o banco de dados "volta_ao_mundo_china" localizado
        // no servidor "127.0.0.1" e autentica com o usuário "root" (sem senha)
        include "conexao.php";
        /*******MUNDANÇA DE CAMINHO*****/

        // Executa a instrução SQL de exclusão utilizando o método
        // "exec" do objeto de conexão PDO criado acima
        $conexao->exec($sql);
    }

    public function carregar()
    {
        // Query SQL para buscar uma turma no banco de dados pelo id
        $sql = "SELECT * FROM tb_mensagem WHERE id=" . $this->id;
        include "conexao.php";
        /*******MUNDANÇA DE CAMINHO*****/

        // Execução da query e armazenamento do resultado em uma variável
        $resultado = $conexao->query($sql);
        // Recuperação da primeira linha do resultado como um array associativo
        $linha = $resultado->fetch();

        // Atribuição dos valores dos campos da turma recuperados do banco às propriedades do objeto
        $this->nome = $linha['nome'];
        $this->email = $linha['email'];
        $this->comentario = $linha['comentario'];
    }


    public function atualizar()
    {
        // Query SQL para atualizar uma mensagem no banco de dados pelo id
        $sql = "UPDATE tb_mensagem SET 
                    nome = '$this->nome' ,
                    email = '$this->email' ,
                    comentario = '$this->comentario' 

                WHERE id = $this->id ";

        include "conexao.php";
        /*******MUNDANÇA DE CAMINHO*****/
        $conexao->exec($sql);
    }
}
