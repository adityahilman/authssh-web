<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Validation Login Page</title>
</head>

<body>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "classess/class.user.php";


$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];
$level = $_POST['txtLevel'];

if ($level == '0') {
   ?>
    <script>alert("Please choose User Level");document.location.href="addusers.html";</script>
    <?php
}
else
{

    $data=new USERS();
    $data->setUsername($username);
    $data->setPassword($password);
    $data->setLevel($level);

    $result=$data->getInsertUser();
    
    if($result) {
        ?>
        <script>alert("Add User is succesfully.");document.location.href="admin.php";</script>
        <?php
    }

}
?>

</body>
</html>