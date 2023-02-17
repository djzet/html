<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/navigation_admin.php"); ?>
<?php
$query = "SELECT * FROM (user_route inner join route on user_route.id_name = route.id_name) inner join users on user_route.id_username = users.id_username";
$res = mysqli_query($conn, $query);
if (!$res) die (mysqli_error($conn));
?>
<div class="view">
<?php
while ($row = mysqli_fetch_assoc($res)) {
   ?>
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
<?php
}
?>
</div>
<?php require_once("includes/footer.php"); ?>
