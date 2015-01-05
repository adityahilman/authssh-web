<?php 
session_start(); 
if (!isset($_SESSION['USERNAME_ADMIN']))
{
    header("location:error.html");
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Admin Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="header">
            <h1>Admin Page</h1>
        </div>
        Logout click <a href="logout.php">here</a>
        <?php 
        
        include "menu.html";
        //include "view.user.summary.php";
        include "summary.ip.php";
        ?>
    </body>
</html>
