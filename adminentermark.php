     <!DOCTYPE html>
<html lang="en">
<?php ?>
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
$sql = "select name from adminsession";
$result = $conn->query($sql);
$count=mysqli_num_rows($result);
if ($count==0) {
    
    header("Location: admin_login.php");
     
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

<body>

    <div id="wrapper">

<?php session_start();?>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button><br>
                <p  style="color:white;font-size:17px; font-weight:100;"> &nbsp &nbsp &nbsp &nbspWelcome&nbsp&nbsp<?php echo $_SESSION["aname"]; ?></p>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo " ".$_SESSION["aname"]; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="divider"></li>
                        <li>
                            <a href="adminlogout.php" ><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li >
                        <a href="adminhome.php"><i class="fa fa-fw fa-file"></i> Student Profile</a>
                    </li>

                    <li >
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Timetable <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="generate.php">Generate</a>
                            </li>
                            <li>
                                <a href="adminview.php">View</a>
                            </li>
                         </ul>
                    </li>
                    <li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-arrows-v"></i> Assessment <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="adminview.php">View Marks</a>
                            </li>
                            <li>
                                <a href="adminenter.php">Enter Marks</a>
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
                          Marks Updation<br><br>
    
                          <table>
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
$sql = "select register_no,name,subject_code,subject_name,max_marks,marks_obtained,mark_2,mark_3 from assessment_1 where subject_code='$_POST[subcode]' AND semester='$_POST[semester]' AND batch='$_POST[batch]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "<thead>"; 
echo "<tr>";
echo "<th>";
echo "<h3>Register Number</h3>";
echo "</th>";
echo "<th>";
echo "<h3>Name</h3>";
echo "</th>";
echo "<th>";
echo "<h3>Subject Code</h3>";
echo "</th>";

echo "<th>";
echo "<h3>Subject Name</h3>";
echo "</th>";
echo "<th>";
echo "<h3>Max Marks</h3>";
echo "</th>";
echo "<th>";
echo "<h3>Assess-I</h3>";
echo "</th>";
echo "</tr>";
echo "</thead>";
     while($row = $result->fetch_assoc()) {
$name=$row["name"];
$reg=$row["register_no"];
//$marks1=$row["marks_obtained"];
//$marks2=$row["mark_2"];
//$marks3=$row["mark_3"];


$code=$row["subject_code"];
$subname=$row["subject_name"];
$max=$row["max_marks"];

echo "<tr>";

echo "<td>";
echo "<h3>&nbsp&nbsp".$reg."&nbsp</h3>";
echo "</td>";
echo "<td>";
echo "<h3>&nbsp&nbsp".$name."&nbsp</h3>";
echo "</td>";
echo "<td>";
echo "<h3>&nbsp&nbsp".$code."&nbsp</h3>";
echo "</td>";
echo "<td>";
echo "<h3>&nbsp".$subname."</h3>";
echo "</td>";
echo "<td>";
echo "<h3>&nbsp&nbsp".$max."&nbsp</h3>";
echo "</td>";
echo "<td>";
//echo "<h3>&nbsp&nbsp".$marks1."&nbsp</h3>";
echo"<form name='assess_edit' action='editadmin.php' method='post' >";

echo"<h6><input id='in' type='text' name='mark' ></h6>";
echo"<input type='hidden' name='reg' value='$reg'>";
echo"<input  type='submit'  onclick='check(this.form)' value='Go' id='i'/><br>";
echo"<form>";
echo "</td>";

echo "</tr>";
}

} else {
    echo "0 results";
}
mysqli_close($conn);

?>
</table>



</h1>
                    </div>
                </div>
<!--    -->
<div class="row">

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
