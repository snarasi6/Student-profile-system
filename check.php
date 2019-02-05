<?php
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

$user = $_POST["username"];
$pwd = $_POST["pwd"];


$sql = "select id,user_name,password from login";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{

     while($row = $result->fetch_assoc()) 
     {
         if ($row["user_name"]== $user && $row["password"] == $pwd)
         {  session_start();
            $_SESSION['login_id']= $row["id"];
            $_SESSION['login_name']= $row["user_name"];

            header("Location: home.php");
         $sql2 = "insert into session values($_SESSION[login_id])";
         if ($conn->query($sql2) === TRUE) {}
         }
     

    }

}
    
 else {

    echo "0 results";
}
mysqli_close($conn);

?>