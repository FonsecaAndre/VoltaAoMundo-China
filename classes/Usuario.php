<?php

class Usuario
{
    public $id;
    public $nomeCompleto;
    public $usuario;
    public $senha;
    public $permissao;

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
    }

    public function inserir()
    {
        if (empty($this->nomeCompleto) || empty($this->usuario) || empty($this->senha) || empty($this->permissao)) {
            throw new Exception('Todos os campos são obrigatórios.');
        }

        include_once "../classes/conexao.php";

        $senhaHash = password_hash($this->senha, PASSWORD_BCRYPT);

        $sql = "INSERT INTO tb_usuario (nomeCompleto, usuario, senha, permissao) VALUES (:nomeCompleto, :usuario, :senha, :permissao)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nomeCompleto', $this->nomeCompleto);
        $stmt->bindParam(':usuario', $this->usuario);
        $stmt->bindParam(':senha', $senhaHash);
        $stmt->bindParam(':permissao', $this->permissao);
        $stmt->execute();

        echo "
        <script type='text/javascript'>
            alert('Novo usuário gravado com sucesso');
            setTimeout(function() {
                window.location.href = '../adm/usu-cad.php';
            }, 1000);
        </script>
        ";
    }

    public function listar()
    {
        $sql = "SELECT * FROM tb_usuario";
        include_once "../classes/conexao.php";
        $resultado = $conexao->query($sql);
        return $resultado->fetchAll();
    }

    
    public function excluir()
    {
        include 'conexao.php';

        $sql = "DELETE FROM tb_usuario WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $this->id);

        $stmt->execute();
    }

    public function carregar()
    {
        $sql = "SELECT * FROM tb_usuario WHERE id = :id";
        include_once "../classes/conexao.php";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $linha = $stmt->fetch();
        $this->nomeCompleto = $linha['nomeCompleto'];
        $this->usuario = $linha['usuario'];
        $this->senha = $linha['senha'];
        $this->permissao = $linha['permissao'];
    }

    public function atualizar()
    {
        $senhaHash = password_hash($this->senha, PASSWORD_BCRYPT);
        $sql = "UPDATE tb_usuario SET nomeCompleto = :nomeCompleto, usuario = :usuario, senha = :senha, permissao = :permissao WHERE id = :id";
        include_once "../classes/conexao.php";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nomeCompleto', $this->nomeCompleto);
        $stmt->bindParam(':usuario', $this->usuario);
        $stmt->bindParam(':senha', $senhaHash);
        $stmt->bindParam(':permissao', $this->permissao);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    }

    public function verificarSenha($senha)
    {
        return password_verify($senha, $this->senha);
    }
}
?>
