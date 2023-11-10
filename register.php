<!-- register.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Регистрация</title>
</head>
<body>
    <header>
        <h1>Регистрация</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Главная</a></li>
            <li><a href="login.php">Вход</a></li>
        </ul>
    </nav>

    <section>
        <h2>Регистрация</h2>
        <form action="register_process.php" method="post">
            <label for="username">Имя пользователя:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Зарегистрироваться</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2023 Мой сайт. Все права защищены.</p>
    </footer>
</body>
</html>
