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

// Obter dados do formulário
$concentracao = $_POST['concentracao'];
$data_registro = date('Y-m-d H:i:s'); // Data atual
$observacoes = $_POST['observacoes'];

// Verificar se há resultados
if ($result->num_rows > 0) {
    // Exibir os dados
    while ($row = $result->fetch_assoc()) {
        echo "<p>Concentração: " . $row['concentracao'] . " - Data: " . $row['data_registro'] . " - <span class='observacao'><i class='fas fa-info-circle'></i> " . $row['observacoes'] . "</span></p>";
    }
} else {
    echo "Nenhum dado encontrado para a data selecionada" . ($horario ? " e horário selecionado." : ".");
}

$conn->close();
?>