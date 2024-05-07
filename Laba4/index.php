<?php
// Подключение к базе данных
$db_host = 'localhost';
$db_name = 'app';
$db_user = 'app@localhost';
$db_pass = 'secret';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Проверка подключения к базе данных
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Обработка отправки формы регистрации
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Проверка наличия заполненных полей
    if (empty($name) || empty($email) || empty($password)) {
        echo "Пожалуйста, заполните все поля.";
    } else {
        // Проверка наличия пользователя с таким же email
        $checkQuery = "SELECT * FROM users WHERE email = '$email'";
        $checkResult = $conn->query($checkQuery);

        if ($checkResult->num_rows > 0) {
            echo "Пользователь с таким email уже существует.";
        } else {
            // Хеширование пароля
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Вставка данных пользователя в базу данных
            $insertQuery = "INSERT INTO users (name, email, password_hash) VALUES ('$name', '$email', '$hashedPassword')";
            if ($conn->query($insertQuery) === TRUE) {
                echo "Регистрация прошла успешно.";
            } else {
                echo "Ошибка при регистрации: " . $conn->error;
            }
        }
    }
}




$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Регистрация и авторизация</title>
</head>
<body>
    <h2>Регистрация</h2>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Имя"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Пароль"><br>
        <input type="submit" name="register" value="Зарегистрироваться">
    </form>

    <h2>Авторизация</h2>
    <form method="POST" action="">
        <input type="email" name="login_email" placeholder="Email"><br>
        <input type="password" name="login_password" placeholder="Пароль"><br>
        <input type="submit" name="login" value="Войти">
    </form>
</body>
</html>
