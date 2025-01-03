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
echo "Conectado com sucesso";

// Exemplo de inserção de dados
$concentracao = 25.5; // Exemplo de concentração
$data_registro = date('Y-m-d H:i:s'); // Data atual
$observacoes = "Registro de amônia em laboratório.";

$sql = "INSERT INTO informacoes_amonia (concentracao, data_registro, observacoes) VALUES ($concentracao, '$data_registro', '$observacoes')";

if ($conn->query($sql) === TRUE) {
    echo "Novo registro criado com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>