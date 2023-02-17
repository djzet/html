<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/navigation_admin.php"); ?>
<?php
// Если флаг на добавление, до добавляем запись
if (isset($_GET['del']) && isset($_GET['id'])) {
    $query = "DELETE FROM `route` WHERE id_name = '$_GET[id]'";
    $res = mysqli_query($conn, $query);
    if (!$res) die (mysqli_error($conn));
    header('Location: delete_route.php');
}
$query = "SELECT * FROM route";
$res = mysqli_query($conn, $query);
if (!$res) die (mysqli_error($conn));
while ($row = mysqli_fetch_assoc($res)) {
   ?>
   <div class="view">
        <h3>Название маршрута: <?= $row['name']; ?></h3>
        <p>Количество свободных мест: <?= $row['count']; ?></p>
        <a href="?del=ok&id=<?= $row['id_name']?>">Удалить</a>
   </div>
   <?php
}
require_once("includes/footer.php"); ?>