<?php
// Database configuration
$host = 'localhost'; // Your database host
$db = 'crazycatgang'; // Your database name
$user = 'root'; // Your database username
$pass = 'PUC@1234'; // Your database password

// Create a connection to MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission for volunteers
if (isset($_POST['Nome_completo'])) {
    $name = $conn->real_escape_string($_POST['Nome_completo']);
    $data_nasc = $conn->real_escape_string($_POST['Data_de_nascimento']);
    $phone = $conn->real_escape_string($_POST['telefone']);
    $email = $conn->real_escape_string($_POST['Email']);
    $cpf = $conn->real_escape_string($_POST['CPF']);
    $funcao = $conn->real_escape_string($_POST['Função_de_interesse']);
    $disponibilidade = $conn->real_escape_string($_POST['Disponibilidade_carona']);
    $residencia = $conn->real_escape_string($_POST['Tipo_de_residência']);
    
    // Insert volunteer data into the database
    $sql = "INSERT INTO volunteers (nome, data_nascimento, telefone, email, cpf, funcao, disponibilidade, moradia_temp) VALUES ('$name', '$data_nasc', '$phone', '$email', '$cpf', '$funcao', '$disponibilidade', '$residencia')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Volunteer registration successful.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle form submission for cat reports
if (isset($_POST['Nome_completo2'])) {
    $name = $conn->real_escape_string($_POST['Nome_completo2']);
    $phone = $conn->real_escape_string($_POST['telefone2']);
    $adress = $name = $conn->real_escape_string($_POST['Endereço']); // Assuming you want to get some description from the file input
    $info = $conn->real_escape_string($_POST['Informacoes']); // Assuming you have an email field in your report form
    // Insert report data into the database
    $sql = "INSERT INTO reports (nome, telefone, endereco) VALUES ('$name', '$phone', '$adress')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Report submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
