<?php
<?php require_once("includes/connection.php"); ?>

// Если флаг на удаление и идентификатор записи не пустой
// то удаляем запись
if (!empty($_GET['add']) && !empty((int)$_GET['id'])) {

   $id = (int)$_GET['id'];
   $query = "DELETE FROM classics WHERE id=$id";
   $res = mysqli_query($mysqli, $query);

   if (!$res) die (mysqli_error($mysqli));

   // Если количество затронутых запростом записей равно 1 (одна запись удалена)
   // то выводим сообщение
   if (mysqli_affected_rows($mysqli) == 1) {
       echo "<h2>Запись с id = $id удалена</h2>";
   }

}

// Если флаг на добавление, до добавляем запись
if (!empty($_POST['submit']) && $_POST['submit'] == 'ADD') {

   // Очищаем пришедшие данные от HTML и PHP тегов
   $author = strip_tags($_POST['author']);
   $title = strip_tags($_POST['title']);
   $type = strip_tags($_POST['type']);
   $year = strip_tags($_POST['year']);

   $query = "INSERT INTO classics (author, title, type, year) VALUES ('$author', '$title', '$type', '$year')";
   $res = mysqli_query($mysqli, $query);

   if (!$res) die (mysqli_error($mysqli));

   // Если количество затронутых запростом записей равно 1 (одна запись добавлена)
   // то выводим сообщение
   if (mysqli_affected_rows($mysqli) == 1) {
       echo "<h2>Запись добавлена</h2>";
   }
}

?>
   <form action="" method="post">
       <label>Author <input type="text" name="author"></label>
       <label>Title <input type="text" name="title"></label>
       <label>Category <input type="text" name="type"></label>
       <label>Year <input type="text" name="year"></label>
       <input type="submit" name="submit" value="ADD">
   </form>

<?php
$query = "SELECT * FROM classics";
$res = mysqli_query($mysqli, $query);
if (!$res) die (mysqli_error($mysqli));

while ($row = mysqli_fetch_assoc($res)) {
   ?>
   <p>
   <h2><?= $row['title']; ?> <a href="?del=ok&id=<?= $row['id']; ?>">уд.</a></h2>
   <?= $row['author']; ?><br>
   Category: <?= $row['type']; ?><br>
   Year: <?= $row['year']; ?><br>
   </p>
   <?php
}