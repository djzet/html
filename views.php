<?php require_once("includes/connection.php"); ?>
<?php
$query = "SELECT * FROM route";
$res = mysqli_query($conn, $query);
if (!$res) die (mysqli_error($conn));

while ($row = mysqli_fetch_assoc($res)) {
   ?>
   <div>
        <h3>Название маршрута: <?= $row['name']; ?></h3>
        <p>Количество свободных мест: <?= $row['count']; ?></p>
        <a href="login.php">Подать заявку</a>
   </div>
   <?php
}