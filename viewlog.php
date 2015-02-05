<?php 
session_start(); 
if (!isset($_SESSION['USERNAME_ADMIN']))
{
    header("location:index.html");
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SSH Two Factor Authentication - Admin Login</title>
	
	<!-- Stylesheets -->
	<!-- <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'> -->
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
	<script src="js/script.js"></script>  
</head>
    <body>
        <!-- TOP BAR -->
        <div id="top-bar">

            <div class="page-full-width cf">

                <ul id="nav" class="fl">

                    <li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong>admin</strong></a>
                        <ul>
                            <li><a href="changepassword.php">Change Password</a></li>
                        </ul> 
                    </li>
                    <li><a href="logout.php" class="round button dark menu-logoff image-left">Log out</a></li>		
                </ul> <!-- end nav -->
            </div> <!-- end full-width -->	

        </div> <!-- end top-bar -->


        <!-- HEADER -->
        <div id="header-with-tabs">	
            <div class="page-full-width cf">
                <ul id="tabs" class="fl">
                    <li><a href="dashboard.php" class="active-tab dashboard-tab">Admin Page SSH Two-Factor Authentication</a></li>
                </ul> <!-- end tabs -->
                <!-- Change this image to your own company's logo -->
                <!-- The logo will automatically be resized to 30px height. -->
                <a href="#" id="company-branding-small" class="fr"><img src="images/openssh_logo.png" alt="OpenSSH" /></a>

            </div> <!-- end full-width -->	

        </div> <!-- end header -->



        <!-- MAIN CONTENT -->
        <div id="content">

            <div class="page-full-width cf">

                <div class="side-menu fl">
                    <h3>Menu</h3>
                    <?php include 'menu.php' ?>
                </div> <!-- end side-menu -->			
                <div class="side-content fr">
                    <div class="content-module">
                        <div class="content-module-heading cf">
                            <h3 class="fl">Summary Users Login</h3>
                        </div> <!-- end content-module-heading -->
                        <div class="content-module-main cf">
                            <div class="content-module-main">
                            <?php
                            include 'classess/class.viewlog.php';
                            $data = new ViewLog();

                            $page = 1;
                            $limit = 5;
                            $offset = 0;

                            if (!empty($_GET['page'])) {
                                $hal = $_GET['page'] - 1;
                                $offset = $limit * $hal;
                            } else if (!empty($_GET['page']) && $_GET['page'] == 1) {
                                $offset = 0;
                            } else if (empty($_GET['page'])) {
                                $offset = 0;
                            }

                            $data->setLimit($limit);
                            $data->setOffset($offset);
                            $data->setPage($page);

                            $result = $data->getPaging();
                            ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>IP Address</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysql_fetch_array($result)) { ?>
                                        <tr>
                                            <td><?= $row['USER_ID'] ?></td>
                                            <td><?= $row['USER_NAME'] ?></td>
                                            <td><?= $row['USER_IP'] ?></td>
                                            <td><?= $row['USER_LASTLOGIN'] ?></td>
                                            <td><?= $row['USER_LOGIN_STATUS'] ?></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="half-size-column fl">
                                <?php
                                $dataTable = $data->getViewLog();
                                $totalData = mysql_num_rows($dataTable);

                                if ($totalData > $limit) {
                                    echo "Page : ";
                                    $a = explode(".", $totalData / $limit);
                                    $b = $a['0'];
                                    $c = $b + 1;
                                    for ($i = 1; $i <= $c; $i++) {
                                        echo '<a style="text-decoration:none;';
                                        if ($_GET['page'] == $i) {
                                            echo "color:red";
                                        }
                                        echo '" href="?page=' . $i . '">' . $i . '</a>';
                                    }
                                }
                                echo "<br/>Total Data : $totalData";
                                ?>
                            </div>
                            <div class="half-size-column fr">
                                <a href="export.php" class="button round blue image-right ic-download text-upper">Download</a>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div> <!-- end content-module -->
                </div> <!-- end side-content -->
            </div> <!-- end full-width -->
        </div> <!-- end content -->

        <!-- FOOTER -->
        <div id="footer">

            <p>&copy; Copyright 2015 <a href="#">Aditya Hilman</a>. - STMIK Nusa Mandiri - Jakarta.</p>

        </div> <!-- end footer -->
    </body>
</html>
