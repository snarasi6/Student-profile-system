<?php session_start();?>



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
$en= $_SESSION["login_id"];



if ($_POST['action'] == 'Name') 
{
$name=$_POST['name'];
$sql = "update basic set name='$name' where id='$en'";   

header("Location: edit.php");
}
 else if ($_POST['action'] == 'Age') {
    //action for delete
$age=$_POST['age'];
$sql = "update basic set age='$age' where id='$en'";   
header("Location: edit.php");
}
else if ($_POST['action'] == 'Address') {
    //action for delete
$address=$_POST['address'];
$sql = "update basic set address='$address' where id='$en'";   
header("Location: edit.php");
} 
else if ($_POST['action'] == 'Mail') {
    //action for delete
$mail=$_POST['mail'];
$sql = "update basic set email='$mail' where id='$en'";   
header("Location: edit.php");
} 

else if ($_POST['action'] == 'Phone') {
    //action for delete
$phone=$_POST['phone'];
$sql = "update basic set mobile='$phone' where id='$en'";   
header("Location: edit.php");
} 
else if ($_POST['action'] == 'Password') {
    //action for delete
$password=$_POST['password'];
$sql = "update login set password='$password' where id='$en'";   
header("Location: edit.php");
} 
else
{
	
}
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
   
} else {
    echo "Error updating record: " . $conn->error;

}

/*
    $row = $result->fetch_assoc()
     {
         if ($row["user_name"]== $user && $row["password"] == $pwd)
         {  session_start();
            $_SESSION['login_id']= $row["id"];
            $_SESSION['login_name']= $row["user_name"];

            header("Location: home.php");
         $sql2 = "insert into session values($_SESSION[login_id])";
         if ($conn->query($sql2) === TRUE) {}
         }
     

    }*/
mysqli_close($conn);

?>