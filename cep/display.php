<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "consulta_cep_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta os registros de endereços
$sql = "SELECT * FROM enderecos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>CEP</th><th>Logradouro</th><th>Bairro</th><th>Cidade</th><th>Estado</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["cep"] . "</td><td>" . $row["logradouro"] . "</td><td>" . $row["bairro"] . "</td><td>" . $row["cidade"] . "</td><td>" . $row["estado"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}
$conn->close();

<!-- display.php -->
<a href="display.php?order=cep">Ordenar por CEP</a>
<a href="display.php?order=logradouro">Ordenar por Logradouro</a>
<a href="display.php?order=bairro">Ordenar por Bairro</a>
<a href="display.php?order=cidade">Ordenar por Cidade</a>
<a href="display.php?order=estado">Ordenar por Estado</a>

<?php
$order = isset($_GET['order']) ? $_GET['order'] : 'cep'; // Campo padrão para ordenação

// Consulta os registros de endereços ordenados pelo campo escolhido
$sql = "SELECT * FROM enderecos ORDER BY $order";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>CEP</th><th>Logradouro</th><th>Bairro</th><th>Cidade</th><th>Estado</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["cep"] . "</td><td>" . $row["logradouro"] . "</td><td>" . $row["bairro"] . "</td><td>" . $row["cidade"] . "</td><td>" . $row["estado"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}
$conn->close();
?>