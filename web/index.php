<?php

session_start();
if(!isset($_SESSION["user"])){
  header("location:login.php");
}

echo '<h1 align=center>Bienvenido usuario:'.$_SESSION["user"].'</h1>';
echo '<p align=center><a href="logout.php">Logout</a></p>';

?>
