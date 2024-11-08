<?php
// Database configuration
$host = 'localhost'; // Your database host
$db = 'crazycatgang'; // Your database name
$user = 'root'; // Your database username
$pass = 'tuasenha'; // Your database password

// Create a connection to MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission for volunteers
if (isset($_POST['Nome_completo'])) {
    $name = $conn->real_escape_string($_POST['Nome_completo']);
    $birthdate = $conn->real_escape_string($_POST['Data_de_nascimento']);
    $phone = $conn->real_escape_string($_POST['telefone']);
    $email = $conn->real_escape_string($_POST['Email']);
    $cpf = $conn->real_escape_string($_POST['CPF']);
    $function = $conn->real_escape_string($_POST['Função_de_interesse']);
    $availability = $conn->real_escape_string($_POST['Dias_Horários']);
    $reason = $conn->real_escape_string($_POST['Motivo_voluntariado']);
    
    // Insert volunteer data into the database
    $sql = "INSERT INTO volunteers (nome, data_nascimento, telefone, email, cpf, funcao, disponibilidade, motivo) 
            VALUES ('$name', '$birthdate', '$phone', '$email', '$cpf', '$function', '$availability', '$reason')";
    
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
    $address = $conn->real_escape_string($_POST['Endereço']);
    $info = $conn->real_escape_string($_POST['Informacoes']);
    
    // Insert report data into the database
    $sql = "INSERT INTO reports (nome, telefone, endereco, informacoes) 
            VALUES ('$name', '$phone', '$address', '$info')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Report submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
