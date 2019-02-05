<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Profile System</title>

   
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
   
    <link href="css/sb-admin.css" rel="stylesheet">

   
    <link href="css/plugins/morris.css" rel="stylesheet">

   
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<style>
body
{
background: url('img/back2.jpg') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;	
}
</style>
<body >
<center>
<p id='head'>Student Profile System</p>
<p id='head'>Admin Login</p>

<div id='box1'>
<form name="login" action="admincheck.php" method="post" >
           <br> <p id='head1'><input type="text" name="username"  placeholder="           Username" onfocus="this.placeholder = ''" onfocusout="this.placeholder = '           Username'"   /></p><br>
            <p id='head1'><input type="password" name="pwd"  placeholder= "           Password" onfocus="this.placeholder = ''"onfocusout="this.placeholder = '           Password'"/><br></p><br>
            <input type="submit"  onclick="check(this.form)" value="Login" id='b'/>
            <input type="reset" value="Cancel" id='b'/>
        </form>

</div>
<br><br><br><br>
<a href="index.php" id='box1' style="text-decoration:none;color:black;"><b>Student Login</b></a>
        <script language="javascript">
            function check(form) { /*function to check userid & password*/
                /*the following code checkes whether the entered userid and password are matching*/
                if(form.username.value == "" || form.pwd.value == "") {
                   
                    alert("Enter Valid Username and Password ")/*displays error message*/

                }
            }
        </script>

</center>
</body>
   
</html>

