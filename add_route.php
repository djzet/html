<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/navigation_admin.php"); ?>
<?php
// Если флаг на добавление, до добавляем запись
if (!empty($_POST['submit']) && $_POST['submit'] == 'Добавить') {
   // Очищаем пришедшие данные от HTML и PHP тегов
   $name = strip_tags($_POST['name']);
   $count = strip_tags($_POST['count']);
   $query = "INSERT INTO route (name, count) VALUES ('$name', '$count')";
   $res = mysqli_query($conn, $query);
   if (!$res) die (mysqli_error($conn));
   header('Location: add_route.php');
}
?>
<div class="container mregister">
   <form action="" method="post">
       <label>Название маршрута <input type="text" name="name"></label>
       <label>Количество мест <input type="text" name="count"></label>
       <p class="submit"><input class="button" id="register" name="submit" type="submit" value="Добавить"></p>
   </form>
</div>
<?php
$query = "SELECT * FROM route";
$res = mysqli_query($conn, $query);
if (!$res) die (mysqli_error($conn));
while ($row = mysqli_fetch_assoc($res)) {
   ?>
   <div class="view">
        <h3>Название маршрута: <?= $row['name']; ?></h3>
        <p>Количество свободных мест: <?= $row['count']; ?></p>
   </div>
   <?php
}
require_once("includes/footer.php"); ?>