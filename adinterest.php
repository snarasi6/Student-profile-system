<!DOCTYPE html>
<html lang="en">

<head>
<link href="css/table.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Profile System</title>

   
    <link href="css/bootstrap.min.css" rel="stylesheet">

   
    <link href="css/sb-admin.css" rel="stylesheet">

   
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
                <p  style="color:white;font-size:17px; font-weight:100;"> &nbsp &nbsp &nbsp &nbspWelcome</style> <?php echo $_SESSION["aname"]; ?></p>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION["aname"]; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="adminhome.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
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
                 <li>
<?php
$reg=$_SESSION['areg'];
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
$sql = "select id,name from basic where register_no=$reg";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$name=$row['name'];
$en= $row['id'];
}
mysqli_close($conn);
                 
echo "<img src=\"img/".$en.".jpg\" id=\"a\" alt=\"IMAGE\" hspace=\"30\">";
                                 
?>                                
                    </li>
                    <li >
                        <a href="profilead.php"><i class="fa fa-user "></i> About <?php echo $name;?></a>
                    </li>
                    <li class="active">
                        <a href="adinterest.php"><i class="fa fa-fw fa-bar-chart-o"></i>Abilities</a>
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
                           Technical Skills
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
$sql = "select area_of_interest from technical where id=$en";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$int= $row['area_of_interest'];


}
mysqli_close($conn);
?>
<div class="row">

<table cellspacing= "30" cellpadding="30" >
<tr>
<td>
<h3>&nbsp&nbspArea of Interest:&nbsp</h3>
</td>
<td>
<h3>&nbsp<?php echo $int; ?></h3>
</td>
</tr>  
</table>
<center>
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
$sql = "select domain,project from technical where id=$en";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "<thead>";	
echo "<tr>";
echo "<th>";

echo "<h3>Domain</h3>";
echo "</th>";
echo "<th>";
echo "<h3>Projects</h3>";
echo "</th>";
echo "</tr>";
echo "</thead>";
     while($row = $result->fetch_assoc()) {
$dom=$row["domain"];
$pro=$row["project"];
echo "<tr>";
echo "<td>";
echo "<h3>&nbsp&nbsp".$dom."&nbsp</h3>";
echo "</td>";
echo "<td>";
echo "<h3>&nbsp".$pro."</h3>";
echo "</td>";
echo "</tr>";
}
} else {
    echo "0 results";
}
mysqli_close($conn);

?>
</table>
</center>
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
