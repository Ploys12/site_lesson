<!-- index.php -->

<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "site_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");  // Перенаправляем на страницу входа, если не авторизован
    exit();
}

$sql = "SELECT title, description, keywords FROM site_info";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Информация о сайте</title>
</head>
<body>
    <header>
        <h1>Информация о сайте</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Главная</a></li>
            <li><a href="about.php">О нас</a></li>
            <li><a href="contact.php">Контакты</a></li>
            <li><a href="site.php">Информация о сайте</a></li>
            <?php
            if (isset($_SESSION['user_id'])) {
                echo '<li><a href="logout.php">Выход</a></li>';
            } else {
                echo '<li><a href="login.php">Вход</a></li>';  // Добавляем ссылку на страницу входа
            }
            ?>
        </ul>
    </nav>

    <section>
        <h2>Информация о сайте</h2>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p><strong>Заголовок:</strong> " . $row["title"] . "</p>";
                echo "<p><strong>Описание:</strong> " . $row["description"] . "</p>";
                echo "<p><strong>Ключевые слова:</strong> " . $row["keywords"] . "</p>";
            }
        } else {
            echo "Нет данных в базе данных.";
        }
        ?>
    </section>

    <footer>
        <p>&copy; 2023 Мой сайт. Все права защищены.</p>
    </footer>
</body>
</html>
