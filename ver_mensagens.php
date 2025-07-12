<?php
$host = "localhost";
$usuario = "root";
$senha = "@Antonio0109";
$banco = "Contatos";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT nome, email, mensagem FROM contatos";
$sql = "SELECT id, nome, email, mensagem FROM contatos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<strong>Nome:</strong> " . htmlspecialchars($row["nome"]) . "<br>";
        echo "<strong>Email:</strong> " . htmlspecialchars($row["email"]) . "<br>";
        echo "<strong>Mensagem:</strong> " . nl2br(htmlspecialchars($row["mensagem"])) . "<br>";
        echo "<form method='POST' action='excluir_mensagem.php' style='display:inline;' onsubmit=\"return confirm('Tem certeza que deseja excluir esta mensagem?');\">
        <input type='hidden' name='id' value='" . $row["id"] . "'>
        <input type='submit' value='Excluir'>
      </form><hr>";
    }
} else {
    echo "Nenhuma mensagem encontrada.";
}

$conn->close();
?>

<?php
//ver as mensagens enviadas
//http://localhost/ProjetoPortifolioWeb/ver_mensagens.php
?>