 <?php
 session_start();
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
$sem=$_SESSION['semad'];
$year=$_SESSION['yearad'];

//echo $year;
$sql = "insert into generation values('$_POST[sub_name]','$_POST[sub_code]',$_POST[credits],$_POST[hours],'$_POST[staff]',$sem,$year,$_POST[lab])";
//$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header("Location: time.php");
mysqli_close($conn);

?> 