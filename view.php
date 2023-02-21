<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/navigation_admin.php"); ?>
<?php
$query = "SELECT *  FROM user_route
            INNER JOIN users ON user_route.id_username = users.id_username
            INNER JOIN route ON user_route.id_name = route.id_name";
$res = mysqli_query($conn, $query);
if (!$res) die (mysqli_error($conn));
?>
<?php
while ($row = mysqli_fetch_assoc($res)) {
   ?>
   <div class="view">
    <table>
        <tr>
            <td>Название маршрута</td>
            <td>Почта</td>
            <td>Количество свободных мест</td>
        </tr>
        <tr>
            <td><?= $row['name']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['count']; ?></td>
        </tr>
    </table>
    </div>
<?php
}
require_once("includes/footer.php"); ?>
