<?php
$servername = "localhost";
$username = "root";
$password = "your_password";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Inscription réussie";
    } else {
        echo "Erreur d'inscription: " . $conn->error;
    }
}

$conn->close();
?>
