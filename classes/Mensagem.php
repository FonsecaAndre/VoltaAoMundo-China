<?php

class Mensagem
{
    public $id;
    public $nome;
    public $email;
    public $comentario;
    public $aprovada;

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
    }

    public function inserir()
    {
        include 'conexao.php';

        $sql = "INSERT INTO tb_mensagem (nome, email, comentario, aprovada) VALUES (:nome, :email, :comentario, :aprovada)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':comentario', $this->comentario);
        // Definindo como não aprovada por padrão
        $aprovada = 0;
        $stmt->bindParam(':aprovada', $aprovada);

        $stmt->execute();

        echo "
        <script type='text/javascript'>
            alert('Comentário enviado com sucesso');
            setTimeout(function() {
                window.location.href = '../comentarios.php';
            }, 1000);
        </script>
        ";
    }

    public function listar()
    {
        include 'conexao.php';

        $sql = "SELECT * FROM tb_mensagem";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function excluir()
    {
        include 'conexao.php';

        $sql = "DELETE FROM tb_mensagem WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $this->id);

        $stmt->execute();
    }

    public function carregar()
    {
        include 'conexao.php';

        $sql = "SELECT * FROM tb_mensagem WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        $linha = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nome = $linha['nome'];
        $this->email = $linha['email'];
        $this->comentario = $linha['comentario'];
        $this->aprovada = $linha['aprovada'];
    }

    public function atualizar()
    {
        include 'conexao.php';

        $sql = "UPDATE tb_mensagem SET nome = :nome, email = :email, comentario = :comentario WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':comentario', $this->comentario);
        $stmt->bindParam(':id', $this->id);

        $stmt->execute();
    }

    public function aprovarMensagem($id)
    {
        include 'conexao.php';
    
        $sql = "UPDATE tb_mensagem SET aprovada = 1 WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
    
        $stmt->execute();
    }
    
    public function reprovarMensagem($id)
    {
        include 'conexao.php';
    
        $sql = "UPDATE tb_mensagem SET aprovada = 0 WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
    
        $stmt->execute();
    }
    
    public function listarAprovadas()
    {
        include 'conexao.php';
    
        $sql = "SELECT * FROM tb_mensagem WHERE aprovada = 1";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
