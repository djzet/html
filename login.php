<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/navigation.php"); ?>
<?php
if (isset($_SESSION["session_username"])) {
    header("location:");
}
?>
<?php
if (isset($_POST["login"])) {
    if (empty($_POST['username']) or empty($_POST['password'])) {
        echo "Все поля обязательны для заполнения!";
    } else {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
        $res = mysqli_fetch_assoc($query);
        $numrows = mysqli_num_rows($query);
        if ($numrows != 0) {
            $_SESSION['session_username'] = $username;
            $_SESSION['session_id'] = $res['id_username'];
            if (isset($_SESSION["session_username"])) {
                header("location: intropage.php");;
            } else {
                echo "Неверное имя пользователя или пароль!";
            }
        }
    }
}
?>
<div class="container mlogin">
    <div id="login">
        <h1>Вход</h1>
        <form action="" id="loginform" method="post" name="loginform">
            <p><label for="user_login">Логин<br>
                    <input class="input" id="username" name="username" size="20" type="text" value=""></label></p>
            <p><label for="user_pass">Пароль<br>
                    <input class="input" id="password" name="password" size="20" type="password" value=""></label></p>
            <p class="submit"><input class="button" name="login" type="submit" value="Вход"></p>
            <p class="regtext">Еще не зарегистрированы?<a href="register.php">Регистрация</a>!</p>
        </form>
    </div>
</div>
<?php require_once("includes/footer.php"); ?>
