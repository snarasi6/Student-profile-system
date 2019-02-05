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
                           Resume
                        </h1>
                    </div>
                </div>
<!--    -->
<h3><h3><b>Name</b></h3><br>
<form name="edit" action="dbupdate.php" method="post" >
 <p id='head1'><input type="text" name="name"  /></p>
            <input type="submit"  onclick="check(this.form)" name="action" value="Name" id='b'/>
           
<h3><b>Address Line 1</b></h3><br>
<p id='head1'><input type="text" name="a1" /><br></p><br>
            <input type="submit"  onclick="check(this.form)" name="action" value="A1" id='b'/>
            <h3><b>Address Line 2</b></h3><br>
<p id='head1'><input type="text" name="a2" /><br></p><br>
            <input type="submit"  onclick="check(this.form)" name="action" value="A2" id='b'/>
            <h3><b>Address Line 3</b></h3><br>
<p id='head1'><input type="text" name="a3" /><br></p><br>
            <input type="submit"  onclick="check(this.form)" name="action" value="A3" id='b'/>
            <h3><b>Address Line 4</b></h3><br>
<p id='head1'><input type="text" name="a4" /><br></p><br>
            <input type="submit"  onclick="check(this.form)" name="action" value="A4" id='b'/>
<br>
 <h3><b>Email-ID</b></h3><br>
 <p id='head1'><input type="text" name="mail"  /></p>
            <input type="submit"  onclick="check(this.form)" name="action" value="Mail" id='b'/>
           <br>
<h3><b>Phone Number</b></h3><br>
 <p id='head1'><input type="text" name="phone"  /></p>
 <input type="submit"  onclick="check(this.form)" name="action" value="Phone" id='b'/>
 
 <h3><b>UG</b></h3><br>
 <p id='head1'><input type="text" name="ug"  /></p>
 <input type="submit"  onclick="check(this.form)" name="action" value="ug" id='b'/>

<h3><b>HSC</b></h3><br>
 <p id='head1'><input type="text" name="hsc"  /></p>
 <input type="submit"  onclick="check(this.form)" name="action" value="hsc" id='b'/>

<h3><b>SSLC</b></h3><br>
 <p id='head1'><input type="text" name="sslc"  /></p>
<input type="submit"  onclick="check(this.form)" name="action" value="sslc" id='b'/>

<h3><b>TECHNICAL SKILLS</b></h3><br>
 <p id='head1'><input type="text" name="tech"  /></p>
<input type="submit"  onclick="check(this.form)" name="action" value="Tech" id='b'/>

<h3><b>SKILLS AND ABILITIES</b></h3><br>
 <p id='head1'><input type="text" name="skill"  /></p>
<input type="submit"  onclick="check(this.form)" name="action" value="Skill" id='b'/>

<h3><b>AWARDS AND ACHIEVEMENTS </b></h3><br>
 <p id='head1'><input type="text" name="award"  /></p>
<input type="submit"  onclick="check(this.form)" name="action" value="Award" id='b'/>

<h3><b>EXTRA CURRICULAR ACTIVITIES </b></h3><br>
 <p id='head1'><input type="text" name="extra"  /></p>
<input type="submit"  onclick="check(this.form)" name="action" value="extra" id='b'/>

<h3><b>PROJECTS</b></h3><br>
 <p id='head1'><input type="text" name="project"  /></p>
<input type="submit"  onclick="check(this.form)" name="action" value="Project" id='b'/>

<h3><b>HOBBIES</b></h3><br>
 <p id='head1'><input type="text" name="hobby"  /></p>
<input type="submit"  onclick="check(this.form)" name="action" value="Hobby" id='b'/>

<h3><b>LINGUISTIC COMPETENCE </b></h3><br>
 <p id='head1'><input type="text" name="lang"  /></p>
<input type="submit"  onclick="check(this.form)" name="action" value="Language" id='b'/>

<h3><b>Father's Name </b></h3><br>
 <p id='head1'><input type="text" name="father"  /></p>
<input type="submit"  onclick="check(this.form)" name="action" value="Father" id='b'/>
<h3><b>DOB</b></h3><br>
 <p id='head1'><input type="text" name="dob"  /></p>
<input type="submit"  onclick="check(this.form)" name="action" value="DOB" id='b'/>
<h3><b>Gender </b></h3><br>
 <p id='head1'><input type="text" name="gender"  /></p>
<input type="submit"  onclick="check(this.form)" name="action" value="Gender" id='b'/>
<h3><b>Nationality</b></h3><br>
 <p id='head1'><input type="text" name="nation"  /></p>
<input type="submit"  onclick="check(this.form)" name="action" value="Nation" id='b'/>
<h3><b>Status</b></h3><br>
 <p id='head1'><input type="text" name="status"  /></p>
<input type="submit"  onclick="check(this.form)" name="action" value="Status" id='b'/>



           

           </form>
</h3>
</div>





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
