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
        include 'classess/class.paging.php';
        $data = new PAGING();
        $limit = 5;
        $position = $data->getPosition();
        $number = $position+1;
        $list = $data->getData();
        ?>
        <table width="75%" align="left" border="1" cellpadding="1" >
            <tr>
                <th>ID</th>
                <td>Username</td>
                <td>IP Address</td>
                <td>Date</td>
                <td>Status</td>
            </tr>
        <?php foreach ($list as $show) { ?>
            <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo $show['USER_NAME']; ?></td>
                <td><?php echo $show['USER_IP']; ?></td>
                <td><?php //$row['USER_LASTLOGIN'] ?></td>
                <td><?php //$row['USER_LOGIN_STATUS'] ?></td>
            </tr>
        <?php $number++; } ?>
        </table>
        <br>
        <?php
        $totalData = $data->countData();
        $totalPage = $data->countPage($totalData, $limit);
        $linkPage = $data->navPage($_GET['page'], $totalPage);
        echo $linkPage;
        ?>
    </body>
</html>
