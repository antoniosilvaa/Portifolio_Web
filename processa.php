<?php
$host = "localhost";
$usuario = "root";
$senha = "@Antonio0109";
$banco = "Contatos";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $mensagem = $conn->real_escape_string($_POST['mensagem']);
    $telefone = $conn->real_escape_string($_POST['telefone']);
    $sql = "INSERT INTO contatos (nome, email, mensagem, telefone) VALUES ('$nome', '$email', '$mensagem', '$telefone')";

    if ($conn->query($sql) === TRUE) {
        echo "Mensagem registrada com sucesso!";
        echo "<br><a href='paginaInicial.html'>Voltar</a>";
    } else {
        echo "Erro: " . $conn->error;
    }
    $conn->close();
} else {
    echo "Acesso inválido.";
}
?>