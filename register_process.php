<!-- register_process.php -->

<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Хеширование пароля
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Регистрация успешна. Теперь вы можете войти.";
    } else {
        echo "Ошибка при регистрации: " . $conn->error;
    }
}

$conn->close();
?>
