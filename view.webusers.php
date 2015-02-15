<?php 
session_start(); 
if (!isset($_SESSION['USERNAME_ADMIN']))
{
    header("location:index.html");
}
if ($_SESSION['LEVEL_ADMIN'] != 'superuser' && $_SESSION['LEVEL_ADMIN'] != 'administrator' ) 
{
    ?>
    <script>alert("Access Denied!");document.location.href="dashboard.php";</script>
    <?php
}
?>

<!DOCTYPE html>

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
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong><?php echo $_SESSION['USERNAME_ADMIN']; ?></strong></a>
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
				<?php
                                include 'menu.php';
                                include 'classess/user.php';
                                ?>
			</div> <!-- end side-menu -->			
			<div class="side-content fr">
				<div class="content-module">
					<div class="content-module-heading cf">
						<h3 class="fl">Users Web</h3>
					</div> <!-- end content-module-heading -->
					<div class="content-module-main cf">
                                            <div class="half-size-column fl">
                                                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                    <table>
                                                        <tr>
                                                            <td>Search By Username</td>
                                                            <td><input type="text" id="simple-input" name="txtSearchUsername" class="round default-width-input"/></td>
                                                            <td><input type="submit" name="btnSearch" id="btnSubmit" class="button round blue image-right ic-right-arrow text-upper" value="Search"/></td>
                                                        </tr>
                                                    </table>
                                                </form>
                                                </div>
                                                <?php
                                                if (isset($_POST['btnSearch']))
                                                {
                                                    $txtSearchUsername = $_POST['txtSearchUsername'];
                                                    if (empty($txtSearchUsername))
                                                    {
                                                        ?> <div class="half-size-column fr"><div class="error-box round">Username is Empty.</div></div>  <?php
                                                    }
                                                    else
                                                    {
                                                        $search = new USERS();
                                                        $search->setUsername($txtSearchUsername);
                                                        $result = $search->getSearchUsers();
                                                        while ($row = mysql_fetch_array($result))
                                                        {
                                                            ?>
                                                        <table>
                                                            <thead>
                                                            <tr>
                                                                <th>Username</th>
                                                                <th>Email</th>
                                                                <th>User Level</th>
                                                                <th>Created By</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td height="25px" width="5px"><?= $row['USERNAME_ADMIN'] ?></td>                                                            
                                                                <td height="25px" width="5px"><?= $row['EMAIL_ADMIN'] ?></td>
                                                                <td height="25px" width="5px"><?= $row['LEVEL_ADMIN'] ?></td>
                                                                <td height="25px" width="5px"><?= $row['CREATED_BY'] ?></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <?php } ?>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>User ID</th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>User Level</th>
                                                        <th>Created By</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <!-- Paging -->
                                                </tfoot>
                                                <tbody>
                                                    <?php
                                                    $data = new USERS();
                                                    
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
                                                    

                                                    $summary = $data->getPagingWebUsers();
                                                    while ($row = mysql_fetch_array($summary)) {
                                                        ?>
                                                        <tr>
                                                            <td height="25px" width="5px"><?= $row['ID_ADMIN'] ?></td>
                                                            <td height="25px" width="5px"><?= $row['USERNAME_ADMIN'] ?></td>
                                                            <td height="25px" width="5px"><?= $row['EMAIL_ADMIN'] ?></td>
                                                            <td height="25px" width="5px"><?= $row['LEVEL_ADMIN'] ?></td>
                                                            <td height="25px" width="5px"><?= $row['CREATED_BY'] ?></td>
                                                            <td height="25px" width="5px"><?php echo "<a class='table-actions-button ic-table-delete' href=delete.users.php?username=$row[USERNAME_ADMIN]>"; echo "</a>"; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <div class="half-size-column fl">
                                            <?php
                                            $dataTable = $data->getWebUsers();
                                             $totalData = mysql_num_rows($dataTable);

                                            if ($totalData > $limit) {
                                                echo "Page  ";
                                                $a = explode(".", $totalData / $limit);
                                                $b = $a['0'];
                                                $c = $b + 1;
                                                for ($i = 1; $i <= $c; $i++) {
                                                    echo '<a style="text-decoration:none;';
                                                    if ($_GET['page'] == $i) {
                                                        echo "color:red";
                                                    }
                                                    echo '" href="?page=' . $i . '">|' . $i . '</a>';
                                                }
                                            }
                                            echo "<br/>";
                                            echo "<br/>Total User : $totalData";
                                            echo "<br/>";
                                            ?>
                                                <br>
                                                <ul class="temporary-button-showcase">
                                                    <li><a href="addusersweb.php" class="button round blue image-right ic-add text-upper">Add User</a></li>
                                                </ul>
                                            </div>
                                            <br>
					</div> <!-- end content-module-main -->
                                      
				</div> <!-- end content-module -->
			</div>
		</div> <!-- end side-content -->
	</div> <!-- end full-width -->
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2015 <a href="#">Aditya Hilman</a>. - STMIK Nusa Mandiri - Jakarta.</p>
		
	
	</div> <!-- end footer -->

</body>
</html>