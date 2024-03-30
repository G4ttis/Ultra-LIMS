<?php
// store.php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cep'])) {
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    // Conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "consulta_cep_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Prepara e executa a consulta SQL
    $sql = "INSERT INTO enderecos (cep, logradouro, bairro, cidade, estado) VALUES ('$cep', '$logradouro', '$bairro', '$cidade', '$estado')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro inserido com sucesso";
    } else {
        echo "Erro ao inserir registro: " . $conn->error;
    }

    $conn->close();
}