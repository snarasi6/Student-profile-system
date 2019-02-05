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

header("Location: create.php");
}
 else if ($_POST['action'] == 'A1') {
    //action for delete
$a1=$_POST['a1'];
$sql = "update basic set a1='$a1' where id='$en'";   
header("Location: create.php");
}
 else if ($_POST['action'] == 'A2') {
    //action for delete
$a2=$_POST['a2'];
$sql = "update basic set age='$a2' where id='$en'";   
header("Location: create.php");
}
 else if ($_POST['action'] == 'A3') {
    //action for delete
$a3=$_POST['a3'];
$sql = "update basic set age='$a3' where id='$en'";   
header("Location: create.php");
}
 else if ($_POST['action'] == 'A4') {
    //action for delete
$a4=$_POST['a4'];
$sql = "update basic set age='$a4' where id='$en'";   
header("Location: create.php");
}

else if ($_POST['action'] == 'Mail') {
    //action for delete
$mail=$_POST['mail'];
$sql = "update basic set email='$mail' where id='$en'";   
header("Location: create.php");
} 

else if ($_POST['action'] == 'Phone') {
    //action for delete
$phone=$_POST['phone'];
$sql = "update basic set mobile='$phone' where id='$en'";   
header("Location: create.php");
} 
else if ($_POST['action'] == 'ug') {
    //action for delete
$ug=$_POST['ug'];
$sql = "update technical set ug='$ug' where id='$en'";   
header("Location: create.php");
} 
else if ($_POST['action'] == 'hsc') {
    //action for delete
$hsc=$_POST['hsc'];
$sql = "update technical set hsc='$hsc' where id='$en'";   
header("Location: create.php");
} 
else if ($_POST['action'] == 'sslc') {
    //action for delete
$sslc=$_POST['sslc'];
$sql = "update technical set sslc='$sslc' where id='$en'";   
header("Location: create.php");
} 
else if ($_POST['action'] == 'Tech') {
    //action for delete
$tech=$_POST['tech'];
$sql = "update technical set area_of_interest='$tech' where id='$en'";   
header("Location: create.php");
}
else if ($_POST['action'] == 'Project') {
    //action for delete
$proj=$_POST['project'];
$sql = "update technical set project='$proj' where id='$en'";   
header("Location: create.php");
} 
else if ($_POST['action'] == 'Skill') {
    //action for delete
$skill=$_POST['skill'];
$sql = "update nontechnical set skills='$skill' where id='$en'";   
header("Location: create.php");
} 
else if ($_POST['action'] == 'Award') {
    //action for delete
$award=$_POST['award'];
$sql = "update nontechnical set awards='$award' where id='$en'";   
header("Location: create.php");
} 
else if ($_POST['action'] == 'extra') {
    //action for delete
$extra=$_POST['extra'];
$sql = "update nontechnical set extra_curr='$extra' where id='$en'";   
header("Location: create.php");
} 
else if ($_POST['action'] == 'Hobby') {
    //action for delete
$h=$_POST['hobby'];
$sql = "update nontechnical set hobbies='$h' where id='$en'";   
header("Location: create.php");
} 
else if ($_POST['action'] == 'Language') {
    //action for delete
$lang=$_POST['lang'];
$sql = "update nontechnical set lang='$lang' where id='$en'";   
header("Location: create.php");
}
else if ($_POST['action'] == 'Father') {
    //action for delete
$f=$_POST['father'];
$sql = "update bio_data set father_name='$f' where id='$en'";   
header("Location: create.php");
} 
else if ($_POST['action'] == 'DOB') {
    //action for delete
$d=$_POST['dob'];
$sql = "update bio_data set dob='$d' where id='$en'";   
header("Location: create.php");
} 
else if ($_POST['action'] == 'Gender') {
    //action for delete
$g=$_POST['gender'];
$sql = "update bio_data set gender='$g' where id='$en'";   
header("Location: create.php");
}
else if ($_POST['action'] == 'Nation') {
    //action for delete
$n=$_POST['nation'];
$sql = "update bio_data set citizenship='$n' where id='$en'";   
header("Location: create.php");
}
else if ($_POST['action'] == 'Status') {
    //action for delete
$s=$_POST['status'];
$sql = "update bio_data set relationship='$s' where id='$en'";   
header("Location: create.php");
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