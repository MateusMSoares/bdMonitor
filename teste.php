<?php
$host = 'localhost';  
$user = 'root';  
$password = 'root';  
$database = 'morpheus';  

// Conectar ao banco de dados
$conn = new mysqli($host, $user, $password, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta para listar tabelas
$sql = "SHOW TABLES";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h3>Tabelas no banco de dados '$database':</h3>";
    echo "<ul>";
    while ($row = $result->fetch_array()) {
        echo "<li>" . $row[0] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Nenhuma tabela encontrada no banco de dados.";
}

$sql = "SHOW STATUS LIKE 'Slow_queries'";
$result = $conn->query($sql);

echo "<h3>Status das consultas lentas:</h3>";
echo "<ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li>{$row['Variable_name']}: {$row['Value']}</li>";
}
echo "</ul>";

$sql = "SELECT * FROM Source";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h3>Dados da Tabela 'Source':</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>";
    
    $fields = $result->fetch_fields();
    foreach ($fields as $field) {
        echo "<th>" . $field->name . "</th>";
    }
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum dado encontrado na tabela 'clientes'.";
}

// Fechar a conexão
$conn->close();
?>
