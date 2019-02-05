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

<?php session_start();
?>
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

                    <li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Timetable <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="generate.php">Generate</a>
                            </li>
                            <li>
                                <a href="admintimeview.php">View</a>
                            </li>
                         </ul>
                    </li>
                    <li >
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
                           Generate Timetable<br><br>
<form name="timetable" action="time1.php" method="post" >
<h3><b>Subject Name</b></h3>
<input id='inp' type="text" name="sub_name" >
<h3><b>Subject Code</b></h3>
<input id='inp' type="text" name="sub_code" >
<h3><b>Staff</b></h3>
<input id='inp' type="text" name="staff" >

<h3><b>Credits</b></h3>
<input id='inp' type="text" name="credits" >
<h3><b>Hours</b></h3>
<input id='inp' type="text" name="hours" >
<h3><b>Laboratory</b></h3>
<h3>Yes <input id='inp' type="radio" name="lab" value="1" style="height:25px; width:25px;"> </h3>
<h3>No <input id='inp' type="radio" name="lab" value="2" style="height:25px; width:25px;"> </h3>
<br><br><input  type="submit"  onclick="check(this.form)" value="Go" id='i'/><br><br>
<a href="generate.php" style="text-decoration:none;color:black;" id='box1'>Next Year</a>
<a href="algo.php" style="text-decoration:none;color:black;" id='box1'>Generate Timetable</a>
                          </form>
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
