<?php
// Verifica se o formulário foi submetido e se o método é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se o botão "Enviar JSON" foi clicado
    if (isset($_POST['submit_json'])) {
        // Verifica se um arquivo JSON foi enviado
        if (isset($_FILES['json_file']) && $_FILES['json_file']['error'] === UPLOAD_ERR_OK) {
            // Obtém o conteúdo do arquivo JSON
            $json_content = file_get_contents($_FILES['json_file']['tmp_name']);

            // Converte o JSON em um array associativo
            $data = json_decode($json_content, true);

            // Verifica se o JSON foi decodificado corretamente
            if ($data !== null) {
                // Inclui o arquivo que contém a definição da classe Mensagem
                require_once "../classes/Mensagem.php";

                // Itera sobre os dados e insere cada mensagem na tabela
                foreach ($data as $mensagem) {
                    $novaMensagem = new Mensagem();
                    $novaMensagem->nome = $mensagem['nome'];
                    $novaMensagem->email = $mensagem['email'];
                    $novaMensagem->comentario = $mensagem['comentario'];
                    $novaMensagem->inserir(); // Método inserir() da classe Mensagem
                }

                // Exibe uma mensagem de sucesso e redireciona
                echo "
                    <script>
                        alert('Arquivo JSON enviado e processado com sucesso');
                        window.location.href = 'mensagem-listar.php';
                    </script>
                ";
            } else {
                // Se houver erro no JSON, exibe uma mensagem de erro
                echo "Erro ao processar o arquivo JSON enviado.";
            }
        } else {
            // Se não houver arquivo JSON enviado, exibe uma mensagem de erro
            echo "Por favor, envie um arquivo JSON válido.";
        }
    }
}
?>
