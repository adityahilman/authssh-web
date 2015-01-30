<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'classess/class.user.php';
        
        $data = new USERS();
        $del_userlinux = $data->getDeleteUsersLinux();
        
        if ($del_userlinux)
        {
            ?> <script>alert("User has been deleted.");document.location.href="view.linuxusers.php";</script> <?php
        }

        ?>
    </body>
</html>
