<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Login Page</title>
    </head>
    <body>
        <?php
        include 'classess/class.viewlog.php';
        $data=new ViewLog();
        $list=$data->getViewLog();
        ?>
        <table width="75%" align="left" border="1" cellpadding="1" >
            <tr>
                <td>ID</td>
                <td>Username</td>
                <td>IP Address</td>
                <td>Date</td>
                <td>Status</td>
            </tr>
        <?php while($row=  mysql_fetch_array($list)) { ?>
            <tr>
                <td><?= $row['USER_ID'] ?></td>
                <td><?= $row['USER_NAME'] ?></td>
                <td><?= $row['USER_IP'] ?></td>
                <td><?= $row['USER_LASTLOGIN'] ?></td>
                <td><?= $row['USER_LOGIN_STATUS'] ?></td>
            </tr>
        <?php } ?>
        </table>
    </body>
</html>
