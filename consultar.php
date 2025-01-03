<?php
$servername = "localhost"; // ou o endereço do seu servidor
$username = "root"; // seu usuário do MySQL
$password = ""; // sua senha do MySQL
$dbname = "amonia_db"; // nome do banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Definir a codificação para utf8mb4
$conn->set_charset("utf8mb4");

// Obter a data e o horário do POST
$data = $_POST['data'];
$horario = isset($_POST['horario']) ? $_POST['horario'] : null;

// Consultar dados com base na data e horário (se fornecido)
if ($horario) {
    $sql = "SELECT * FROM informacoes_amonia WHERE DATE(data_registro) = ? AND TIME(data_registro) = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $data, $horario);
} else {
    $sql = "SELECT * FROM informacoes_amonia WHERE DATE(data_registro) = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $data);
}

$stmt->execute();
$result = $stmt->get_result();

// Verificar se há resultados
if ($result->num_rows > 0) {
    // Exibir os dados
    while ($row = $result->fetch_assoc()) {
        echo "<p>Concentração: " . $row['concentracao'] . " - Data: " . $row['data_registro'] . " - <span class='observacao'>Observações: " . $row['observacoes'] . "</span></p>";
    }
} else {
    echo "Nenhum dado encontrado para a data selecionada" . ($horario ? " e horário selecionado." : ".");
}

$stmt->close();
$conn->close();
?>