<?php session_start();
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
$sql = "select id from login";
$result = $conn->query($sql);

while($result->num_rows > 0) {
$row = $result->fetch_assoc();
$id=$row['id'];
if($id==$_POST['reg_no'])
{
$_SESSION['areg']=$_POST['reg_no'];
header("Location: profilead.php");
break;
}
}




?>