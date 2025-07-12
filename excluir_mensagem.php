<?php
$host = "localhost";
$usuario = "root";
$senha = "@Antonio0109";
$banco = "Contatos";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $sql = "DELETE FROM contatos WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Mensagem excluída com sucesso.<br>";
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }
    echo "<a href='ver_mensagens.php'>Voltar</a>";
} else {
    echo "Requisição inválida.";
}

$conn->close();
?>