<?php require_once("includes/connection.php"); ?>
<?php
if(isset($_GET['add']) && isset($_GET['id'])){
   $query = "INSERT INTO `user_route`(`id_name`, `id_username`) VALUES ('$_GET[id]', '$_SESSION[session_id]')";
   $res = mysqli_query($conn, $query);
   if (!$res) die (mysqli_error($conn));
   $query = "UPDATE `route` SET `count` = count - 1 WHERE id_name = $_GET[id]";
   $res = mysqli_query($conn, $query);
   header('Location: intropage.php');
}
$query = "SELECT * FROM users inner join user_route on users.id_username = user_route.id_username WHERE users.id_username = user_route.id_username";
$res = mysqli_query($conn, $query);
$numrows = mysqli_num_rows($res);
if($numrows != 0){
   ?>
      <div class="view">
         <h3><?= $_SESSION['session_username']; ?> ждите звонка</h3>
      </div>
   <?php
}else{
   $query = "SELECT * FROM route";
   $res = mysqli_query($conn, $query);
   if (!$res) die (mysqli_error($conn));
   while ($row = mysqli_fetch_assoc($res)) {
      if($row['count'] <= 0){
         ?>
         <div class="view">
           <h3>На маршрут "<?= $row['name'] ?>" места закончились</h3>
         </div>
      <?php
      }else {
         ?>
         <div class="view">
           <h3>Название маршрута: <?= $row['name']; ?></h3>
           <p>Количество свободных мест: <?= $row['count']; ?></p>
           <a href="?add=ok&id=<?= $row['id_name']; ?>">Подать заявку</a>
      </div>
      <?php
      }
   }
}