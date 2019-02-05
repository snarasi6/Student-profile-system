<?php   
session_start(); 
session_destroy(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "srp";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$sql = "delete from adminsession where name='$_SESSION[aname]'";
$result = $conn->query($sql);
$count = mysqli_num_rows($result);
header("Location: admin_login.php");
mysqli_close($conn);

?>
exit();
?>