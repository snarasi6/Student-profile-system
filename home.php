<!DOCTYPE html>
<html lang="en">
<?php
//session checking
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
$sql = "select id from session";
$result = $conn->query($sql);
$count=mysqli_num_rows($result);
if ($count==0) {
    
    header("Location: index.php");
     
} else {
    echo "0 results";
}
mysqli_close($conn);

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Profile System</title>

   
    <link href="css/bootstrap.min.css" rel="stylesheet">

   
    <link href="css/sb-admin.css" rel="stylesheet">
<link href="css/table.css" rel="stylesheet">
   
    <link href="css/plugins/morris.css" rel="stylesheet">

   
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

   <link href="css/style.css" rel="stylesheet">
</head>
<script>
function session_checking()
{
    $.post( "session.php", function( data ) {
        if(data == "-1")
        {
            alert("Your session has been expired!");
            header("Location: home.php");
        }
    });
}
</script>
<?php session_start();?>
<body>

    <div id="wrapper">

   
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button><br>
                <p  style="color:white;font-size:17px; font-weight:100;"> &nbsp &nbsp &nbsp &nbspWelcome</style> <?php echo $_SESSION["login_name"]; ?></p>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo " ".$_SESSION["login_name"]; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="home.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php" ><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                 <li>
<?php
$en= $_SESSION["login_id"];                 
echo "<img src=\"img/".$en.".jpg\" id=\"a\" alt=\"IMAGE\" hspace=\"30\">";
                                 
?>                                
                    </li>
                    <li class="active">
                        <a href="home.php"><i class="fa fa-user "></i> About Me</a>
                    </li>
                    <li>
                        <a href="interest.php"><i class="fa fa-fw fa-bar-chart-o"></i>Abilities </a>
                    </li>
                    <li>
                        <a href="timetable.php"><i class="fa fa-fw fa-table"></i>Time Table </a>
                    </li>
                    <li>
                        <a href="edit.php"><i class="fa fa-fw fa-edit"></i> Edit Profile</a>
                    </li>
                    <li>
                        <a href="subject.php"><i class="fa fa-fw fa-desktop"></i> Subjects</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Assessment <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="a1.php">Assess-1</a>
                            </li>
                            <li>
                                <a href="a2.php">Assess-2</a>
                            </li>
                            <li>
                                <a href="a3.php">Assess-3</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-envelope-o"></i> Resume <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="c/view.php" target="_blank">View/Download Resume </a>
                            </li>
                            <li>
                                <a href="create.php">Edit/Create Resume</a>
                            </li>
                        </ul>
                    </li>
                

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           About Me 
                        </h1>
                    </div>
                </div>
<!--    -->
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
$sql = "select id,name,department,register_no,batch,year,age,address,email,semester,mobile from basic where id='$_SESSION[login_id]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$name= $row['name'];
$dept= $row['department'];
$rno= $row['register_no'];
$batch= $row['batch'];
$year= $row['year'];
$age= $row['age'];
$add= $row['address'];
$email= $row['email'];
$sem=$row['semester'];
$mob=$row['mobile'];
$_SESSION['year']= $year;
$_SESSION['sem']=$sem;
}
mysqli_close($conn);
?>
<div class="row">
<?php
$en=0;
$en= $_SESSION["login_id"];                 


echo "<img src=\"img/".$en.".jpg\" id=\"a1\" alt=\"IMAGE\" hspace=\"30\">";                              
?> 
<table cellspacing= "30" cellpadding="30" >
<tr>
<td>
<h3>&nbsp&nbspName&nbsp</h3>
</td>
<td>
<h3>:&nbsp<?php echo $name; ?></h3>
</td>
</tr>  
<tr>
<td>
<h3>&nbsp&nbspAge&nbsp</h3>
</td>
<td>
<h3>:&nbsp<?php echo $age; ?></h3>
</tr>
<tr>
<td>
<h3>&nbsp&nbspDepartment&nbsp</h3>
</td>
<td>
<h3>:&nbsp<?php echo $dept; ?></h3>
</td>
</tr>  
<tr>
<td>
<h3>&nbsp&nbspYear&nbsp</h3>
</td>
<td>
<h3>:&nbsp<?php echo $year; ?></h3>
</td>
</tr>
<tr>
<td>
<h3>&nbsp&nbspBatch&nbsp</h3>
</td>
<td>
<h3>:&nbsp<?php echo $batch; ?></h3>
</td>
</tr>    
<tr>
<td>
<h3>&nbsp&nbspRegister Number&nbsp</h3>
</td>
<td>
<h3>:&nbsp<?php echo $rno; ?></h3>
</td>
</tr>  
<tr>
<td>
<h3>&nbsp&nbspAddress&nbsp</h3>
</td>
<td>
<h3>:&nbsp<?php echo $add; ?></h3>
</td>
</tr>  
<tr>
<td>
<h3>&nbsp&nbspEmail ID&nbsp</h3>
</td>
<td>
<h3>:&nbsp<?php echo $email; ?></h3>
</td>
</tr>  
<tr>
<td>
<h3>&nbsp&nbspMobile&nbsp</h3>
</td>
<td>
<h3>:&nbsp<?php echo $mob; ?></h3>
</td>
</tr>  

</table>
</div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
