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
        include 'classess/class.viewlog.php';
        $data=new ViewLog();
        $list=$data->getUserSummaryLog();
        ?>
        <table align="left" border="1" cellpadding="1" >
            <tr>
                <td>Username</td>
                <td>Hit</td>
            </tr>
        <?php while($row=  mysql_fetch_array($list)) { ?>
            <tr>
                <td><?= $row['USER_NAME'] ?></td>
                <td><?= $row['COUNT(*)'] ?></td>
            </tr>
        <?php } ?>
        </table>
    </body>
</html>
