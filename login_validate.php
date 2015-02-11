<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Validation Login Page</title>
</head>

<body>
<?php
session_start();

include "classess/db.php";
include "config/config.db.php";

$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];

$query = "select * from USER_ADMIN where USERNAME_ADMIN = '$username' and PASSWORD_ADMIN='$password'";
$c=new ConnectionDB();
$c->openConnection();
$result=mysql_query($query);
$login=mysql_num_rows($result);
$userData=  mysql_fetch_array($result, MYSQLI_ASSOC);
if ($login) 
{
    //$_SESSION['USERNAME_ADMIN']= $username;
    session_regenerate_id();
    $_SESSION['USERNAME_ADMIN']=$userData['USERNAME_ADMIN'];
    $_SESSION['LEVEL_ADMIN']=$userData['LEVEL_ADMIN'];
    $level=$_SESSION['LEVEL_ADMIN'];
    
    if ($level=='superuser')
    {
       ?>
       <script language=javascript>document.location.href="dashboard.php";</script>
       <?php
    }
    else
    {
        ?>
        <script language=javascript>document.location.href="dashboard.php";</script>
        <?php
    }
}
else 
{
     ?>
    <script>alert("Wrong Username or Password!");document.location.href="index.html";</script>
    <?php
    echo mysql_error();
}
?>
</body>
</html>
