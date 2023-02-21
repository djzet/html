<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/navigation.php"); ?>
<?php
if (!isset($_SESSION["session_username"])) :
    header("location:login.php");
else :
?>
    <div id="welcome">
        <h2>Добро пожаловать, <span><?php echo $_SESSION['session_username']; ?>! </span></h2>
    </div>
<?php require_once("add.php"); ?>
<?php endif; ?>
<?php require_once("includes/footer.php"); ?>
