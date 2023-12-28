<?php
session_start();

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
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            echo "Connexion réussie";
            // Vous pouvez également définir une variable de session ici pour gérer la connexion de l'utilisateur.
        } else {
            echo "Mot de passe incorrect";
        }
    } else {
        echo "Utilisateur non trouvé";
    }
}

$conn->close();
?>
