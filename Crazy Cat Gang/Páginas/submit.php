<?php
// Database configuration
$host = 'localhost'; // Your database host
$db = 'crazycatgang'; // Your database name
$user = 'root'; // Your database username
$pass = 'Newhuss2020'; // Your database password

// Create a connection to MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission for volunteers
if (isset($_POST['Nome completo'])) {
    $name = $conn->real_escape_string($_POST['Nome completo']);
    $email = $conn->real_escape_string($_POST['Email']);
    $phone = $conn->real_escape_string($_POST['Telefone']);
    $created_at = date('Y-m-d H:i:s');

    // Insert volunteer data into the database
    $sql = "INSERT INTO volunteers (name, email, phone, created_at) VALUES ('$name', '$email', '$phone', '$created_at')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Volunteer registration successful.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle form submission for cat reports
if (isset($_POST['localização'])) {
    $location = $conn->real_escape_string($_POST['localização']);
    $cat_description = $conn->real_escape_string($_POST['gatinho']); // Assuming you want to get some description from the file input
    $reporter_email = $conn->real_escape_string($_POST['email']); // Assuming you have an email field in your report form
    $reporter_phone = $conn->real_escape_string($_POST['horário']); // Assuming you want to get the time from the form
    $created_at = date('Y-m-d H:i:s');

    // Insert report data into the database
    $sql = "INSERT INTO reports (cat_description, location, reporter_email, reporter_phone, created_at) VALUES ('$cat_description', '$location', '$reporter_email', '$reporter_phone', '$created_at')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Report submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
