<?php session_start();
$_SESSION["semad"]=$_POST['sem'];
$_SESSION["yearad"]=$_POST['year'];
header("Location: time.php");

?>
