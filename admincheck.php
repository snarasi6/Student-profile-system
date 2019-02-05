
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "srp";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

$user = $_POST["username"];
$pwd = $_POST["pwd"];


$sql = "select name,password from admin";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{

     while($row = $result->fetch_assoc()) 
     {
         if ($row["name"]== $user && $row["password"] == $pwd)
         {  session_start();
            $_SESSION['aname']= $row["name"];
            
            header("Location: adminhome.php");
         $sql2 = "insert into adminsession values('$_SESSION[aname]')";
         if ($conn->query($sql2) === TRUE) {}
         }
     

    }

}
    
 else {

    echo "0 results";
}
mysqli_close($conn);

?>