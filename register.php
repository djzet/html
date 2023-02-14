<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/navigation.php"); ?>
<?php
if (isset($_POST["register"])) {
    if (!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` = '$username'");
        $numrows = mysqli_num_rows($query);
        if ($numrows == 0) {
            $sql = "INSERT INTO `users` (email, username, password) VALUES ('$email', '$username', '$password')";
            $result = mysqli_query($conn ,$sql);
            if ($result) {
                $message = "Учетная запись успешно создана";
            } else {
                $message = "Не удалось вставить информацию о данных! SQL-запрос:" . $sql;
            }
        } else {
            $message = "Это имя пользователя уже существует! Пожалуйста, попробуйте еще раз!";
        }
    } else {
        $message = "Все поля обязательны для заполнения!";
    }
}
?>

<?php if (!empty($message)) {
    echo "<p class='error'>" . $message . "</p>";
} ?>
<div class="container mregister">
    <div id="login">
        <h1>Регистрация</h1>
        <form action="" id="registerform" method="post" name="registerform">
            <p><label for="user_login">Логин<br>
                    <input class="input" id="username" name="username" size="32" type="text" value=""></label></p>
            <p><label for="user_pass">E-mail<br>
                    <input class="input" id="email" name="email" size="32" type="email" value=""></label></p>
            <p><label for="user_pass">Пароль<br>
                    <input class="input" id="password" name="password" size="32" type="password" value=""></label></p>
            <p class="submit"><input class="button" id="register" name="register" type="submit" value="Зарегистрироваться"></p>
            <p class="regtext">Уже зарегистрированы? <a href="login.php">Введите имя пользователя</a>!</p>
        </form>
    </div>
</div>
<?php include("includes/footer.php"); ?>