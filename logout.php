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



$sql = "delete from session where id='$_SESSION[login_id]'";
$result = $conn->query($sql);
$count = mysqli_num_rows($result);
header("Location: index.php");
mysqli_close($conn);

?>
exit();
?>