 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "srp";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//echo $_POST['reg'];
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "update assessment_1 set marks_obtained='$_POST[mark]' where register_no='$_POST[reg]'";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
//    echo "Record updated successfully";
  //header("Location: adminentermark.php"); 
header("Location: adminenter.php");
} else {
    echo "Error updating record: " . $conn->error;

}


?>