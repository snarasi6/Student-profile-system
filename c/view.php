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
//echo $year;
$sql = "select name,a1,a2,a3,a4,email,mobile from basic where register_no='$_SESSION[login_id]'";
//$result = $conn->query($sql);

$result = $conn->query($sql);
if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
         $name=$row['name'];
         $a1=$row['a1'];
         $a2=$row['a2'];
         $a3=$row['a3'];
         $a4=$row['a4'];
         $email=$row['email'];
         $mob=$row['mobile'];
         
         }
} else {
    echo "0 results";
}
$sql2 = "select ug,sslc,hsc,area_of_interest,project,domain from technical where id='$_SESSION[login_id]'";
$result = $conn->query($sql2);
if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
         $ug=$row['ug'];
         $sslc=$row['sslc'];
         $hsc=$row['hsc'];
         $area=$row['area_of_interest'];
         $pro=$row['project'];
         $domain=$row['domain'];
              }
} else {
    echo "0 results";
}

$sql3 = "select  extra_curr,awards,skills,hobbies,lang from nontechnical where id='$_SESSION[login_id]'";
$result = $conn->query($sql3);
if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
         $extra=$row['extra_curr'];
         $award=$row['awards'];
         $skill=$row['skills'];
         $hobby=$row['hobbies'];
         $lan=$row['lang'];
            }
} else {
    echo "0 results";
}

$sql4 = "select   father_name,dob,gender,citizenship,relationship from bio_data where id='$_SESSION[login_id]'";
$result = $conn->query($sql4);
if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
         $father=$row['father_name'];
         $dob=$row['dob'];
         $gen=$row['gender'];
         $nation=$row['citizenship'];
         $stat=$row['relationship'];
            }
} else {
    echo "0 results";
}
require('WriteHTML.php');
$en= $_SESSION["login_id"];                 

$pdf=new PDF_HTML();

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
$pdf->Image('../img/'.$en.'.jpg',150,30,30,40);
$pdf->SetFont('Arial','B',14);

$pdf->SetFont('Arial','B',10); 
$htmlTable='<b>'.$name.'</b><br><br>'.$a1.'<br>'.$a2.'<br>'.$a3.'<br>'.$a4.'<br><br>Email id: '.$email.'<br>Mobile Number: '.$mob.'<br><br><br>
<b>EDUCATIONAL QUALIFICATION</b><br><justify><ul style="list-style-type: circle;"><li>'.$ug.'</li><br><li>'.$hsc.'</li><br><li>'.$sslc.'</li><br></ul></justify><br><br><b>TECHNICAL SKILLS</b><br><br>'.$area.'<br><br><b>SKILLS AND ABILITIES</b><br><br>'.$skill.'<b><br><br>AWARDS AND ACHIEVEMENTS </b><br><br>'.$award.'<br><br><b>EXTRA CURRICULAR ACTIVITIES</b><br><br>'.$extra.'<br><br><b>PROJECTS</b><br><br>'.$pro.' in '.$domain.'<br><br><b>HOBBIES</b><br><br>'.$hobby.'<br><br><b>LINGUISTIC COMPETENCE</b><br><br>'.$lan.' <br><br><br><br><br><br><br><br><b>BIO-DATA/PERSONAL DETAILS 
</b><br><br>Fathers Name : '.$father.'<br><br>Date of birth : '.$dob.'<br><br>Sex : '.$gen.'<br><br>Nationality : '.$nation.'<br><br>Nuptial status: '.$stat.' <br><br><br><br><br><br>'.$name.'

';
$pdf->WriteHTML2("<br><br><br>$htmlTable");
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 
?>